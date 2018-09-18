<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Occupation;
use DB;
use App\Medical;
use App\MedicalOccupation;
use App\EmployeeMedical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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
            // $employees = Employee::all();
            $occupations = Occupation::all();

            $employees = DB::table('employees')
            ->join('occupations', 'employees.occupation_id', '=' ,'occupations.id')
            ->select('employees.*','occupations.name')
            ->get();

            // $data_dump = dd($employees);

            return view('employees.index', compact('employees'));
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
            
            $occupations = Occupation::all();
            return view('employees.create')->with('occupations', $occupations);
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

            //check if employee alread exists
            $employee = Employee::
                  where('first_name', $request->input('first_name'))
                ->where('last_name', $request->input('last_name'))
                ->first();

            if ($employee) {
               // employee exists
                return redirect()->route('employees.index', ['employee'=>$employee->id])->with('success',' Employee already exists.');
            }

            $employee = Employee::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'occupation_id' => $request->input('occupation_id'),
                'occupation_type' => $request->input('occupation_type'),
            ]);
            
            if($employee){
                return redirect()->route('employees.show',['employee'=>$employee->id])->with('success', 'Employee Created successfully');
            }

        }

        return back()->withInput()->with('errors', 'Failed to add a new employee.');
        
    }

    public function addmed(Request $request)
    {
        
        $employee_id = Input::get('employee_id');
        $medical_ids = Input::get('medical_id');
        $last_exam_dates = Input::get('last_exam');
        $due_exam_dates = Input::get('due_exam');
        $medical_status = 1;

       
        $result = array_map(function($medical_id, $last_exam, $due_exam) {
            return array_combine(
                ['medical_id', 'last_exam', 'due_exam'], [$medical_id, $last_exam, $due_exam]);
        }, $medical_ids, $last_exam_dates, $due_exam_dates);

        $results = json_encode($result);
        
        $array = json_decode($results, true);
        foreach($array as $row){

             $employee_medical = EmployeeMedical::create([
                'employee_id' => $employee_id,
                'medical_id' => $row["medical_id"],
                'last_exam' => $row["last_exam"],
                'due_exam' => $row["due_exam"],
            ]);

        }

        if($employee_medical){

                $employee_update = Employee::where('id', $employee_id)->update([
                'medical_status'=> $medical_status,
                ]);

                return redirect()->route('employees.index')->with('success','Successfully added medical to employee.');
        }else{

            return back()->withInput()->with('errors', 'Failed to add medicals to employee.');
        }
        


        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        $employee = Employee::where('id', $employee->id)->first();
        $medical = MedicalOccupation::where('occupation_id',$employee->occupation_id)->get();
        $occupation = Occupation::where('id', $employee->occupation_id)->first();

        $meds = DB::table('medical_occupation')
        ->join('medicals', 'medical_occupation.medical_id', '=' ,'medicals.id')
        ->select('medical_occupation.*','medicals.*')
        ->where('occupation_id',$employee->occupation_id)
        ->get();

        $medicals = DB::table('employee_medical')
        ->join('medicals', 'employee_medical.medical_id', '=' ,'medicals.id')
        ->select('employee_medical.*', 'medicals.name')
        ->where('employee_id',$employee->id)
        ->get();

         

        return view('employees.show', compact('employee', 'medical','meds','medicals','occupation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $employee = Employee::where('id', $employee->id)->first();
        $medical = MedicalOccupation::where('occupation_id',$employee->occupation_id)->get();
        $occupation = Occupation::where('id', $employee->occupation_id)->first();

        $meds = DB::table('medical_occupation')
        ->join('medicals', 'medical_occupation.medical_id', '=' ,'medicals.id')
        ->select('medical_occupation.*','medicals.*')
        ->where('occupation_id',$employee->occupation_id)
        ->get();

        $medicals = DB::table('employee_medical')
        ->join('medicals', 'employee_medical.medical_id', '=' ,'medicals.id')
        ->select('employee_medical.*', 'medicals.name')
        ->where('employee_id',$employee->id)
        ->get();

        return view('employees.edit', compact('employee','medical','medicals','occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        
            if(Auth::check()){

               $employeeUpdate = Employee::where('id', $employee->id)->update([
                'first_name'=>$request->input('first_name'),
                'last_name'=>$request->input('last_name'),
                'occupation_type'=>$request->input('occupation_type'),
                ]);


                $employee_id = Input::get('employee_id');
                $medical_ids = Input::get('medical_id');
                $last_exam_dates = Input::get('last_exam');
                $due_exam_dates = Input::get('due_exam');
                $id = Input::get('id');
                $medical_status = 1;

               
                $result = array_map(function($id, $medical_id, $last_exam, $due_exam) {
                    return array_combine(
                        ['id','medical_id', 'last_exam', 'due_exam'], [$id, $medical_id, $last_exam, $due_exam]);
                }, $id, $medical_ids, $last_exam_dates, $due_exam_dates);

                

                $results = json_encode($result);
                // echo $results;

                $array = json_decode($results, true);
                foreach($array as $row){

                     $employee_medical_update = EmployeeMedical::where('id', $row["id"])->update([
                        'employee_id' => $employee_id,
                        'medical_id' => $row["medical_id"],
                        'last_exam' => $row["last_exam"],
                        'due_exam' => $row["due_exam"],
                    ]);

                }

                if($employeeUpdate && $employee_medical_update){
                    return redirect()->route('employees.show', ['employee'=>$employee->id])->with('success','Employee details updated successfully');
                }

                //redirect
                return back()->withInput();                                             
            
        }
        return view('auth.login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
