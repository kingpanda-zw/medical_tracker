<?php

namespace App\Http\Controllers;

use App\Occupation;
use App\MedicalOccupation;
use App\Medical;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class OccupationsController extends Controller
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

            $occupations = Occupation::all();

            return view('occupations.index', compact('occupations'));
        }

        return view('auth.login');
    }

    public function addmed(Request $request)
    {
        
        //take a occupation, add a medical to it
        $occupation = Occupation::find($request->input('occupation_id'));
        $medical = Medical::where('name', $request->input('name'))->first();//single record

        //check if medical is already added to occupation
        $occupationMedical = MedicalOccupation::where('medical_id',$medical->id)->
        where('occupation_id', $occupation->id)->first();

        if($occupationMedical){
            //if user already exists, exit
            return redirect()->route('occupations.show', ['occupation'=>$occupation->id])->with('errors', $request->input('name').' is already a medical for this occupation.');
        }


        if($medical && $occupation){

             $occupation->medicals()->attach($medical->id);

             return redirect()->route('occupations.show', ['occupation'=>$occupation->id])->with('success', $request->input('name').' was added to the occupation successfully');   
        }

    return redirect()->route('occupations.show', ['occupation'=>$occupation->id])->with('errors',' Error adding medical to occupation.');
        
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

            return view('occupations.create');

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
            $occupation = Occupation::where('name', $request->input('name'))->first();
            if ($occupation) {
               // occupation exists
                return redirect()->route('occupations.index', ['occupation'=>$occupation->id])->with('success', $request->input('name').' already exists.');
            }

            $occupation = Occupation::create([
                'name' => $request->input('name'),
            ]);
            
            if($occupation){
                return redirect()->route('occupations.show',['occupation'=>$occupation->id])->with('success', 'Occupation Created successfully');
            }
        }

        return back()->withInput()->with('errors', 'Failed to add a new occupation.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        //
        $occupations = Occupation::find($occupation->id);
        $medicals = Medical::all();
        // $medical_occ = MedicalOccupation::where('medical_id',$medicals, 'occupation_id', $occupation->id)->get();

        $medical_occ = DB::table('medical_occupation')
            ->join('medicals', 'medical_occupation.medical_id', '=' ,'medicals.id')
            ->select('medical_occupation.*','medicals.name')
            ->where('occupation_id',$occupations->id)
            ->get();

        return view('occupations.show', compact('occupation', 'medicals', 'medical_occ'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        //
        $occupations = Occupation::find($occupation->id);

        return view('occupations.edit', compact('occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation $occupation)
    {
        //
        if(Auth::check()){

            // $occupation = Occupation::where('name', $request->input('name'))->first();
            // if ($occupation) {
            //    // occupation exists
            //     return redirect()->route('occupations.index', ['occupation'=>$occupation->id])->with('success', $request->input('name').' already exists.');
            // }

               $occupationUpdate = Occupation::where('id', $occupation->id)->update([
                'name'=>$request->input('name'),
                ]);

                if($occupationUpdate){
                    return redirect()->route('occupations.index', ['occupation'=>$occupation->id])->with('success','Occupation updated successfully');
                }

                //redirect
                return back()->withInput();                                             
            
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        //
        $findOccupation = Occupation::find($occupation->id);
        if($findOccupation->delete()){
            return redirect()->route('occupations.index')->with('success', 'Occupation deleted successfully');
        }
        return back()->withInput()->with('error', 'Occupation could not be deleted');

    }

    public function removemed(Occupation $occupation)
    {
        //
        $medical_id = Input::get('medical_id');
        $findMedical = MedicalOccupation::find($medical_id);
        // dd($findMedical);

        if($findMedical->delete()){

            return redirect()->route('occupations.show',['occupation'=>$occupation->id])->with('success', 'Medical removed successfully');

        }
        return back()->withInput()->with('error', 'Medical could not be removed.');

    }

}
