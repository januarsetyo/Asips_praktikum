<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $super_admin = SuperAdmin::all();
        return view('Multiuser/superadmin',
        ['kecamatan'=>$super_admin],
        ['kelurahan'=>$super_admin],
        ['posyandu'=>$super_admin],
        ['balita'=>$super_admin],
        ['role'=>$super_admin],
        ['history_posyandu'=>$super_admin],
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
            'username'=>'required|unique:user',
            'password'=>'required'
        ]);
        $validatedata['password']=bcrypt($validatedata['password']);
        SuperAdmin::create($validatedata);
        $super_admin = SuperAdmin::latest()->first()->id;

        DB::table('users')->insert([
            'id'            => $super_admin,
            'username'      => $validatedata['nama'],
            'password'      => $validatedata['password'],
            'role'          => 'admin_posyandu',
        ]);
        $request->session()->flash('success','regis berhasil silahkan log in');
        return redirect('/login');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
