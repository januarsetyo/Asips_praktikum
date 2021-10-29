<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balita = Balita::all();
        return view('master/balita',
        ['balita'=>$balita]);

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

		$table = new Balita(); // tabel

        //value
        $table->nama_balita              = $data['nama_balita'];
        $table->nik_orang_tua            = $data['nik_orang_tua'];
        $table->nama_orang_tua           = $data['nama_orang_tua'];
        $table->tgl_lahir_balita         = $data['tgl_lahir_balita'];
        $table->jenis_kelamin_balita     = $data['jenis_kelamin_balita'];
        $table->id_posyandu              = $data['id_posyandu'];
		$table->save();

        return redirect('/balita');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function show(Balita $balita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function edit(Balita $balita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balita $balita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balita  $balita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balita $balita)
    {
        //
    }
    public function tambahbalita()
    {
        $posyandu = Posyandu::all();
        return view('tambah/tambahbalita',
        ['posyandu'=>$posyandu]
    );
    }
}
