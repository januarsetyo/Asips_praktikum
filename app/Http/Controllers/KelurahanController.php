<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kelurahan as GlobalKelurahan;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = DB::table('kelurahan')->where('DELETED_AT',null)->get();
        return view('master/kelurahan',
        ['kelurahan'=>$kelurahan]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $validatedata=$request->validate([
            'kelurahan'=>'required',
            'id_kecamatan'=>'required'
        ]);
        Kelurahan::create($validatedata);
        $request->session()->flash('success','berhasil menambahkan kelurahan');
        return redirect('/kelurahan')->with('hapus','Data berhasil ditambah');
    }

    public function editKelurahan(Request $request){
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::where('id',$request->id)->first();
        return view('edit/editkelurahan', ['kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('kelurahan') ->where('id',$request->id) ->update([
            'kelurahan'=>$request->kelurahan
        ]);
        return redirect('/kelurahan')->with('hapus','Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('kelurahan')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);

    	return redirect('/kelurahan')->with('hapus','Data berhasil dihapus');
    }
    public function tambahkelurahan()
    {
        $kecamatan = kecamatan::all();
        return view('tambah/tambahkelurahan',
        ['kecamatan'=>$kecamatan]
    );
    }
}
