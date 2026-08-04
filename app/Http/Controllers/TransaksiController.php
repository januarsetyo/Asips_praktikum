<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')->orderBy('created_at', 'desc')->paginate(10);
        return view('transaksi.index', ['transaksi' => $transaksi]);
    }

    public function tambah()
    {
        $barang = Barang::all();
        $noTransaksi = $this->generateNoTransaksi();
        return view('transaksi.tambah', [
            'barang'      => $barang,
            'noTransaksi' => $noTransaksi,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer'            => 'required',
            'items'               => 'required|array|min:1',
            'items.*.kode_barang' => 'required',
            'items.*.qty'         => 'required|integer|min:1',
        ], [
            'customer.required'   => 'Customer wajib diisi.',
            'items.required'      => 'Minimal terdapat 1 item.',
            'items.min'           => 'Minimal terdapat 1 item.',
            'items.*.kode_barang.required' => 'Barang wajib dipilih.',
            'items.*.qty.min'     => 'Qty harus lebih besar dari 0.',
        ]);

        // Cek stok cukup sebelum menyimpan
        foreach ($request->items as $item) {
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if (!$barang || $barang->stok < $item['qty']) {
                $sisa = $barang ? $barang->stok : 0;
                return back()->withInput()
                    ->with('error', "Stok {$item['nama_barang']} tidak mencukupi (sisa stok: {$sisa})");
            }
        }

        $total = 0;
        foreach ($request->items as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        DB::transaction(function () use ($request, $total) {
            $transaksi = Transaksi::create([
                'no_transaksi' => $request->no_transaksi,
                'tanggal'      => $request->tanggal,
                'customer'     => $request->customer,
                'total'        => $total,
            ]);

            foreach ($request->items as $item) {
                TransaksiDetail::create([
                    'transaksi_id' => $transaksi->id,
                    'kode_barang'  => $item['kode_barang'],
                    'nama_barang'  => $item['nama_barang'],
                    'qty'          => $item['qty'],
                    'harga'        => $item['harga'],
                    'sub_total'    => $item['harga'] * $item['qty'],
                ]);

                DB::table('barang')
                    ->where('kode_barang', $item['kode_barang'])
                    ->decrement('stok', $item['qty']);
            }
        });

        return redirect('/transaksi')->with('sukses', 'Transaksi berhasil disimpan');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('detail')->findOrFail($id);
        return view('transaksi.show', ['transaksi' => $transaksi]);
    }

    public function delete($id)
    {
        DB::table('transaksi')->where('id', $id)->delete();
        return redirect('/transaksi')->with('sukses', 'Transaksi berhasil dihapus');
    }

    private function generateNoTransaksi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $prefix = 'TRX' . date('ymd') . '-';

        $last = DB::table('transaksi')
            ->where('no_transaksi', 'like', $prefix . '%')
            ->orderBy('no_transaksi', 'desc')
            ->first();

        $urut = $last ? ((int) substr($last->no_transaksi, -4)) + 1 : 1;

        return $prefix . str_pad($urut, 4, '0', STR_PAD_LEFT);
    }
}
