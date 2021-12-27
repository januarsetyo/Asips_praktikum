<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posyandu = DB::table('posyandu')->where('DELETED_AT',null)->get();
        return view('master/posyandu',
        ['posyandu'=>$posyandu]
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
        $data = $request->input(); // insert into

		$table = new Posyandu(); // tabel

        //value
        $table->nama_posyandu       = $data['posyandu'];
        $table->alamat_posyandu     = $data['alamat'];
        $table->id_kelurahan         = $data['id_kelurahan'];
		$table->save();

        return redirect('/posyandu');
    }

    public function editPosyandu(Request $request){
        $kelurahan = Kelurahan::all();
        $posyandu = Posyandu::where('id',$request->id)->first();
        return view('edit/editposyandu', ['kelurahan'=>$kelurahan, 'posyandu'=>$posyandu]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(Posyandu $posyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posyandu $posyandu)
    {
        DB::table('posyandu') ->where('id',$request->id) ->update([
            'id_kelurahan' => $request->id_kelurahan,
            'nama_posyandu' => $request->posyandu,
            'alamat_posyandu' => $request->alamat_posyandu,
        ]);
        return redirect('/posyandu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posyandu  $posyandu
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('posyandu')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);

    	return redirect('/posyandu')->with('hapus','Data berhasil dihapus');
    }
    public function tambahposyandu()
    {
        $kelurahan = kelurahan::all();
        return view('tambah/tambahposyandu',
        ['kelurahan'=>$kelurahan]
    );
    }


}
