<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history_posyandu = DB::table('history_posyandu')->where('DELETED_AT',null)->get();
        return view('laporan/history',
        ['history_posyandu'=>$history_posyandu]
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

        $data = $request->input(); // insert into

		  $table = new History(); // tabel

        //  //value
         $table->tgl_posyandu           = $data['tgl_posyandu'];
         $table->berat_badan_balita     = $data['berat_badan_balita'];
         $table->tinggi_badan           = $data['tinggi_badan'];
         $table->id_balita              = $data['id_balita'];
		 $table->save();

        return redirect('/history')->with('hapus','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHistory(Request $request)
    {
        $balita = Balita::all();
        $history_posyandu = History::where('id',$request->id)->first();
        return view('edit/edithistory', ['balita'=>$balita, 'history_posyandu'=>$history_posyandu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('history_posyandu') ->where('id',$request->id) ->update([
            
            'tgl_posyandu'          => $request->tgl_posyandu,
            'berat_badan_balita'    => $request->berat_badan_balita,
            'tinggi_badan'          => $request->tinggi_badan,
        ]);
        return redirect('/history')->with('hapus','Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('history_posyandu')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);

    	return redirect('/history')->with('hapus','Data berhasil dihapus');
    }

    public function tambahhistory()
    {
        $balita = Balita::all();
        return view('tambah/tambahhistory',
        ['balita'=>$balita]
    );
    }
}
