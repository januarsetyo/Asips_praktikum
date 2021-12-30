<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = DB::table('user_role')->where('DELETED_AT',null)->get();
        return view('admin/userrole',
        ['userrole'=>$user_role]
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
            'user_role'=>'required',
            'id_user'=>'required',
            'id_role'=>'required'
            
        ]);
        UserRole::create($validatedata);
        $request->session()->flash('success','berhasil menambahkan kelurahan');
        return redirect('/userrole')->with('hapus','Data berhasil ditambah');
    }

    public function editUserRole(Request $request){
        $user = User::all();
        $role = Role::all();
        $user_role = UserRole::where('id',$request->id)->first();
        return view('edit/edituserrole', ['user'=>$user, 'role'=>$role,  'user_role'=>$user_role]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        date_default_timezone_set('Asia/Jakarta');
        DB::table('user_role') ->where('id',$request->id) ->update([
            'user_role'=>$request->userrole
        ]);
        return redirect('/userrole')->with('hapus','Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        DB::table('user_role')->where('id',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);

    	return redirect('/userrole')->with('hapus','Data berhasil dihapus');
    }

    public function tambahuserrole()
    {
        $user = User::all();
        $role = Role::all();
        return view('tambah/tambahuserrole',
        ['user'=>$user],
        ['role'=>$role]
    );
    }
}
