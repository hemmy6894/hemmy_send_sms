<?php

namespace Hemmy\RoleManager\Controllers;

use App\Http\Controllers\Controller;
use Hemmy\RoleManager\Models\SystemFunctionModel;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Function = SystemFunctionModel::orderBy('id','ASC');
        $functions = $Function->paginate();
        return view('hemmy_role::function.index',\compact('functions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hemmy_role::function.create');
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
        
        foreach(explode(',',$request->name) as $name){
            $function = SystemFunctionModel::create([
                'function_name' => $name,
            ]);
        }
        return \redirect()->back()->withErrors(['sms' => 'Created Success','header' => 'Successfully!!','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\FunctionModel  $FunctionModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Function = SystemFunctionModel::where('id',$id);
        if(!$Function->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }

        $disabled = "disabled";
        $Function = $Function->get()[0];
        return view('hemmy_role::function.edit',compact('function','disabled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\FunctionModel  $FunctionModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Function = FunctionModel::where('id',$id);
        if(!$Function->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }
        $function = $Function->get()[0];
        return view('hemmy_role::function.edit',compact('function'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth\FunctionModel  $FunctionModel
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $Function = SystemFunctionModel::where('id',$id);
        if(!$Function->count()){
            return \redirect()->back()->withErrors(['sms' => 'Not found!!','header' => 'Not Found!!','type'=>'danger']);
        }
        $Function = $Function->update([
            'function_name' => $request->name,
        ]);
        return \redirect()->back()->withErrors(['sms' => 'Updated Success!!','header' => 'Successfully!!','type'=>'danger']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\FunctionModel  $FunctionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
