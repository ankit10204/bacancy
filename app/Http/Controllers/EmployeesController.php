<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Companies;
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
        $employees = Employees::with('company')->paginate(10);
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $companies = Companies::pluck('id','name')->all();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'company_id' => 'required'
        ]);

        $post = Employees::createUpdate($request);
         if($post){
            return redirect()->route('employees.index')->with('success','Employees Add successfully');
         }else{
            return redirect()->route('employees.index')->with('error','There is some issue');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees,$id)
    {
        $employees = Employees::where('id',$id)->first();
        $companies = Companies::pluck('id','name')->all();
        return view('employees.edit',compact('employees','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees,$id)
    {  
       $validatedData = $request->validate([
          'first_name' => 'required',
          'last_name' => 'required',
          'company_id' => 'required'
        ]);

       $post = Employees::createUpdate($request,$id);
         if($post){
            return redirect()->route('employees.index')->with('success','Employee update successfully');
         }else{
            return redirect()->route('employees.index')->with('error','There is some issue');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees,$id)
    {
      $employee = Employees::find($id);
      if($employee->delete()){
        return redirect()->route('employees.index')->with('success','Employee delete successfully');
      }else{
        return redirect()->route('employees.index')->with('error','There is some issue');
      }
    }
}
