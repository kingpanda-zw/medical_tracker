<?php

namespace App\Http\Controllers;

use App\Medical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MedicalsController extends Controller
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


            $medicals = Medical::all();

            return view('medicals.index', compact('medicals'));

        }

        return view('auth.login');
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

            return view('medicals.create');
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
            $medical = Medical::where('name', $request->input('name'))->first();
            if ($medical) {
               // medical exists
                return redirect()->route('medicals.index', ['medical'=>$medical->id])->with('success', $request->input('name').' already exists.');
            }

            $medical = Medical::create([
                'name' => $request->input('name'),
            ]);
            
            if($medical){
                return redirect()->route('medicals.index',['medical'=>$medical->id])->with('success', 'Medical created successfully');
            }
        }

        return back()->withInput()->with('errors', 'Failed to add a new medical.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function show(medical $medical)
    {
        //
        $medicals = Medical::find($medical->id);

        return view('medicals.edit', compact('medical'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function edit(Medical $medical)
    {
        //
        $medicals = Medical::find($medical->id);

        return view('medicals.edit', compact('medical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medical $medical)
    {
        //
        if(Auth::check()){

               $medicalUpdate = Medical::where('id', $medical->id)->update([
                'name'=>$request->input('name'),
                ]);

                if($medicalUpdate){
                    return redirect()->route('medicals.index', ['medical'=>$medical->id])->with('success','Medical updated successfully');
                }

                //redirect
                return back()->withInput();                                             
            
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medical  $medical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medical $medical)
    {
        //
        $findMedical = Role::find($medical->id);
        if($findMedical->delete()){
            return redirect()->route('roles.index')->with('success', 'Medical test deleted successfully');
        }
        return back()->withInput()->with('error', 'Medical test could not be deleted');
    }
}
