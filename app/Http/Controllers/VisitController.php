<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Visit;
use App\Models\Doctor;
use App\Models\Ticket;
use App\Models\patient;
use App\Models\Product;
use Illuminate\Http\Request;


class VisitController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = patient::get();
        $doctors = Doctor::get();
        $visits = Visit::where('status',0)->orderBy('id', 'DESC')->get();
        $products = Product::get();
        return view('visits.index',compact('visits','patients','products','doctors'));
    }

    public function endVisit()
    {
        $patients = patient::get();
        $doctors = Doctor::get();
        $visits = Visit::where('status',1)->orderBy('id', 'DESC')->get();
        $products = Product::get();
        return view('visits.endVisit',compact('visits','patients','products','doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ticket.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Visit::create([
            'date'=>$request->date,
            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'note'=>$request->note,
            'status'=>0,
        ]);

        return redirect()->route('visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $visit = Visit::where('id',$id)->first();
     
        $visit->update([
            'date'=>$request->date,
            'patient_id'=>$request->patient_id,
            'doctor_id'=>$request->doctor_id,
            'note'=>$request->note,
            'status'=>0,
        ]);

        return redirect()->route('visits.index');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visits = visit::where('id',$id)->first();
        $visits->delete();
        return redirect()->route('visits.index');
    }




}
