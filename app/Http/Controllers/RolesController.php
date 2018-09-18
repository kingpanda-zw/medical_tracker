<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){

            $roles = Role::all();

            return view('roles.index', compact('roles'));
        }

        return vew('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check()){

            return view('roles.create');
        }
        return view('auth.login');
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
        if(Auth::check()){
            $role = Role::where('name', $request->input('name'))->first();
            if ($role) {
               // role exists
                return redirect()->route('roles.index', ['role'=>$role->id])->with('success', $request->input('name').' already exists.');
            }

            $role = Role::create([
                'name' => $request->input('name'),
            ]);
            
            if($role){
                return redirect()->route('roles.index',['role'=>$role->id])->with('success', 'Role created successfully');
            }
        }

        return back()->withInput()->with('errors', 'Failed to add a new role.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $roles = Role::find($role->id);

        return view('roles.edit', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $roles = Role::find($role->id);

        return view('roles.edit', compact('role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        if(Auth::check()){

               $roleUpdate = Role::where('id', $role->id)->update([
                'name'=>$request->input('name'),
                ]);

                if($roleUpdate){
                    return redirect()->route('roles.index', ['role'=>$role->id])->with('success','Role updated successfully');
                }

                //redirect
                return back()->withInput();                                             
            
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $findRole = Role::find($role->id);
        if($findRole->delete()){
            return redirect()->route('roles.index')->with('success', 'User-role deleted successfully');
        }
        return back()->withInput()->with('error', 'User-role could not be deleted');
    }
}
