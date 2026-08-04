<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $barang = DB::table('barang')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_barang', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('master.barang', ['barang' => $barang, 'search' => $search]);
    }

    public function tambahbarang()
    {
        return view('tambah.tambahbarang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang',
            'nama_barang' => 'required',
            'harga'       => 'required|integer|min:1',
            'stok'        => 'required|integer|min:0',
        ], [
            'kode_barang.unique' => 'Kode Barang sudah digunakan.',
            'harga.min'          => 'Harga harus lebih besar dari 0.',
            'stok.min'           => 'Stok tidak boleh bernilai negatif.',
        ]);

        Barang::create($request->only(['kode_barang', 'nama_barang', 'harga', 'stok']));

        return redirect('/barang')->with('sukses', 'Data barang berhasil ditambahkan');
    }

    public function editBarang(Request $request)
    {
        $barang = Barang::findOrFail($request->id);
        return view('edit.editbarang', ['barang' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga'       => 'required|integer|min:1',
            'stok'        => 'required|integer|min:0',
        ], [
            'harga.min' => 'Harga harus lebih besar dari 0.',
            'stok.min'  => 'Stok tidak boleh bernilai negatif.',
        ]);

        DB::table('barang')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'updated_at'  => now(),
        ]);

        return redirect('/barang')->with('sukses', 'Data barang berhasil diubah');
    }

    public function delete($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        return redirect('/barang')->with('sukses', 'Data barang berhasil dihapus');
    }

    public function getBarang(Request $request)
    {
        $barang = Barang::where('kode_barang', $request->kode)->first();
        return response()->json($barang);
    }
}
