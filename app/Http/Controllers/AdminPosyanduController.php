<?php

namespace App\Http\Controllers;

use App\Models\AdminPosyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_posyandu = AdminPosyandu::all();
        return view('Multiuser/adminposyandu',
        ['history_posyandu'=>$admin_posyandu]
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
        AdminPosyandu::create($validatedata);
        $adminPosyanduid = AdminPosyandu::latest()->first()->id;

        DB::table('users')->insert([
            'id'            => $adminPosyanduid,
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
     * @param  \App\Models\AdminPosyandu  $adminPosyandu
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPosyandu $adminPosyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPosyandu  $adminPosyandu
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminPosyandu $adminPosyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPosyandu  $adminPosyandu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminPosyandu $adminPosyandu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminPosyandu  $adminPosyandu
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminPosyandu $adminPosyandu)
    {
        //
    }
}
