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
        $balita = DB::table('balita')->where('DELETED_AT',null)->get();
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
        $table->nama_balita              = $data['nama'];
        $table->nik_orang_tua            = $data['nik'];
        $table->nama_orang_tua           = $data['nama orang tua'];
        $table->tgl_lahir_balita         = $data['tanggal'];
        $table->jenis_kelamin_balita     = $data['jk'];
        $table->id_posyandu              = $data['id_posyandu'];
		$table->save();

        return redirect('/balita');
    }
    public function editBalita(Request $request){
        $posyandu = Posyandu::all();
        $balita = Balita::where('id',$request->id)->first();
        return view('edit/editbalita', ['posyandu'=>$posyandu, 'balita'=>$balita]);
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
        DB::table('posyandu') ->where('id',$request->id) ->update([
            'id_kelurahan' => $request->id_kelurahan,
            'nama_balita' => $request->nama_balita,
            'nik_orang_tua' => $request->nik_orang_tua,
            'nama_orang_tua' => $request->nama_orang_tua,
            'tgl_lahir_balita' => $request->tgl_lahir_balita,
            'jenis_kelamin_balita' => $request->jenis_kelamin_balita,

        ]);
        return redirect('/balita');
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
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('balita')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);

    	return redirect('/balita')->with('hapus','Data berhasil dihapus');
    }
    public function tambahbalita()
    {
        date_default_timezone_set('Asia/Jakarta');
        $posyandu = Posyandu::all();
        return view('tambah/tambahbalita',
        ['posyandu'=>$posyandu]
    );
    }
}
