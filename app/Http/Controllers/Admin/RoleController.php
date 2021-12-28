<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id','!=',2)->get();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create($request->all());
        $notification=array(
            'message'=>'Role Created Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('role.index')->with($notification);
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
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
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
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::findOrFail($id)->update($request->all());
        $notification=array(
            'message'=>'Role Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('role.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Role Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}



































































<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Carbon\Carbon;
use Session;

class PermissionController extends Controller{
    public function index(){
      $all = Role::orderBy('role_auto_id','ASC')->get();
      $getAll = Permission::orderBy('perm_id','DESC')->get();
      return view('admin.permission.all',compact('getAll','all'));
    }



    public function delete($id){
      $delete = Permission::where('perm_id',$id)->delete();
      if($delete){
        Session::flash('success_delete','value');
        return redirect()->back();
      }
    }

    public function edit($id){
      $all = Role::orderBy('role_auto_id','ASC')->get();
      $edit = Permission::where('perm_id',$id)->first();
      return view('admin.permission.edit',compact('all','edit'));
    }

    public function store(Request $request){
      // form validation
      $this->validate($request,[
        'role_id' => 'required|numeric|unique:permissions,role_id',
      ],[]);
      // insert data in database
      $insert = Permission::create($request->all());
      if($insert){
        Session::flash('success_add','value');
        return redirect()->back();
      }

    }

    public function update(Request $request,$id){
      // form validation
      // $this->validate($request,[
      //   'role_id' => 'required|exists:permissions,role_id'
      // ],[]);
      // insert data in database
      $update = Permission::where('perm_id',$id)->update([
        'role_id' => $request->role_id,
      ]);
      if($update){
        Session::flash('success_add','value');
        return redirect()->back();
      }

    }
}






















