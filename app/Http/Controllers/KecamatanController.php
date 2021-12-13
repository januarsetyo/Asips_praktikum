<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = DB::table('kecamatan')->where('DELETED_AT',null)->get();
        return view('master/kecamatan',
        ['kecamatan'=>$kecamatan]
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
        $validatedata=$request->validate([
            'kecamatan'=>'required'
        ]);
        Kecamatan::create($validatedata);
        $request->session()->flash('success','berhasil menambahkan kecamatan');
        return redirect('/kecamatan');
    }

    public function editKecamatan(Request $request){
        $kecamatan = Kecamatan::where('id',$request->id)->first();
        return view('edit/editkecamatan', ['kecamatan'=>$kecamatan]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        DB::table('kecamatan') ->where('id',$request->id) ->update([
            'kecamatan'=>$request->kecamatan
        ]);
        return redirect('/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('kecamatan')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/kecamatan')->with('hapus','Data berhasil dihapus Bund');

    }
    public function tambahkecamatan()
    {
        
        return view('tambah/tambahkecamatan');
    }
}