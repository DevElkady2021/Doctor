<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\patient;
use Illuminate\Http\Request;
Use Alert;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = patient::get();
        return view('patients.index',compact('patients'));
    }

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
        patient::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'note'=>$request->note,
            'type'=>$request->type,

        ]);
        Alert::success(' تم اضافة البيانات بنجاح ');
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $patients =patient::where('id',$id)->first();
        $patients->update([
            'name'=>$request->name,
            'age'=>$request->age,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'note'=>$request->note,
            'type'=>$request->type,
        ]);
        Alert::success(' تم تحديث البيانات بنجاح ');
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients =patient::where('id',$id)->first();
        $patients->delete();
        Alert::success(' تم حذف البيانات بنجاح ');
        return redirect()->route('patients.index');
    }
}
