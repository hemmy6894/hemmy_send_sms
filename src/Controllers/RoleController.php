<?php

namespace Hemmy\RoleManager\Controllers;

use App\Http\Controllers\Controller;
use Hemmy\RoleManager\Models\RoleModel;
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
        //
        $role = RoleModel::orderBy('id','ASC');
        $roles = $role->paginate();
        return view('hemmy_role::role.index',\compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hemmy_role::role.create');
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
        $this->validate($request,[
            'name' => 'required'
        ]);

        $role = RoleModel::create([
            'name' => $request->name,
        ]);
        return \redirect()->back()->withErrors(['sms' => 'Created Success','header' => 'Successfully!!','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = RoleModel::where('id',$id);
        if(!$role->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }

        $disabled = "disabled";
        $role = $role->get()[0];
        return view('hemmy_role::role.edit',compact('role','disabled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = RoleModel::where('id',$id);
        if(!$role->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }
        if(isset($_GET['block'])){
            // return RedirectHelper::block_user($role);
        }
        $role = $role->get()[0];
        return view('hemmy_role::role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $role = RoleModel::where('id',$id);
        if(!$role->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }
        $role = $role->update([
            'name' => $request->name,
        ]);
        return \redirect()->back()->withErrors(['sms' => 'Updated Success!!','header' => 'Successfully!!','type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\RoleModel  $roleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function display_roles(){
        return view('hemmy_role::settings.index');
    }

    public function populate_roles(){
        $data['modelRoles'] = UserRoleModel::user_per_role();
        return view('hemmy_role::settings.roles',$data);
    }

    public function change_roles(Request $request){
        $rid = $request->rid;
        $break_down_rid = explode('-',$rid);
        $role = $break_down_rid[1];
        $function_name = $break_down_rid[0];
        $status = $request->status;

        if(UserRoleModel::where('rid','=',$rid)->count()){
            UserRoleModel::where('rid','=',$rid)->update(['status' => $status]);
        }else{
            UserRoleModel::create(
                [
                    'rid' => $rid,
                    'role' => $role,
                    'function_name' => $function_name,
                    'status' => $status
                ]
            );
        }
    }
}



/**
 * Roles Routes download_wcf
 *   Route::get('/roles_settings', 'User\RoleController@display_roles')->name('roles_settings');
  *  Route::get('/populate_roles', 'User\RoleController@populate_roles')->name('populate_roles');
  *  Route::post('/change_roles', 'User\RoleController@change_roles')->name('change_roles');
 */