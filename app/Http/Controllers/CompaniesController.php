<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $companies = Companies::paginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('companies.create');
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
          'name' => 'required',
          'image' => 'mimes:jpeg,jpg,png|max:2048|dimensions:max_width=100,max_height=100',
        ]);

        $post = Companies::createUpdate($request);
         if($post){
            return redirect()->route('companies.index')->with('success','Company Add successfully');
         }else{
            return redirect()->route('companies.index')->with('error','There is some issue');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies,$id)
    {
        $companies = Companies::where('id',$id)->first();
        return view('companies.edit',compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies,$id)
    {
       $validatedData = $request->validate([
          'name' => 'required',
          'image' => 'mimes:jpeg,jpg,png|max:2048|dimensions:max_width=100,max_height=100',
        ]);
       
        $post = Companies::createUpdate($request,$id);
         if($post){
            return redirect()->route('companies.index')->with('success','Company update successfully');
         }else{
            return redirect()->route('companies.index')->with('error','There is some issue');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies,$id)
    {
      $companies = Companies::find($id);
      if($companies->delete()){
        return redirect()->route('companies.index')->with('success','Company delete successfully');
      }else{
        return redirect()->route('companies.index')->with('error','There is some issue');
      }
    }
}
