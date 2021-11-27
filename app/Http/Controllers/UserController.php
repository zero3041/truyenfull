<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

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
        //
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
    public function impersonate($id){
        $user = User::find($id);
        if($user){
            Session::put('impersonate',$user->id);

        }
        return redirect('/home');
    }
    public function stopImpersonate(){

    }
    public function index()
    {
        //Role::create(['name'=>'Admin']);
        //Permission::create(['name' => 'publish articles']);
        // $role = Role::find(4);
        // $permission = Permission::find(4);

        // $role->givePermissionTo($permission);
        // $role->revokePermissionTo($permission);
        //auth()->user()->givePermissionTo('edit articles');
        // auth()->user()->assignRole('writer');
        // return auth()->user()->permissions;
        //return auth()->user()->getDirectPermissions();
        // return auth()->user()->getAllPermissions();
        // return auth()->user()->getPermissionsViaRoles();
        // return User::role('writer')->get();
       // auth()->user()->removeRole('writer');
        //return User::permission('add articles')->get();
        $user = User::with('roles','permissions')->orderBy('id','DESC')->get();

        return view('home')->with(compact('user'));
    }
    public function assignRole($id){
        $user = User::find($id);
        $name_roles = $user->roles->first()->name;
        $all_column_roles = $user->roles->first();
        $role = Role::orderBy('id','DESC')->get();
        return view('admincp.user.assign_roles')->with(compact('role','user','name_roles','all_column_roles'));
    }
    public function insert_roles(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        // $user->removeRole($data['role']);
        // $user->assignRole($data['role']);
        return redirect()->back()->with('status','Thêm vai trò cho user thành công');
    }
}
