<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::get();
        return view('Doctors.index',compact('doctors'));
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
        if($request->image === null){
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => bcrypt(123456789),
            ]);
    
            $doctor = Doctor::create([
                'user_id'=>$user->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'Specialization'=>$request->Specialization,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>'http://localhost/Doctor/public/img/user4.png', // صوره افتراضيه 
                'about'=>$request->about,
                'note'=>$request->note,
                'other_data'=>$request->other_data,
            ]);
        }else{
            if($request->hasfile('image')){
                $file = $request->image;
                $newfile = time().'.'. $file->getClientOriginalName();
                $file->move('storage/Doctors',$newfile); 
            } 

            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => bcrypt(123456789),
            ]);
    
            $doctor = Doctor::create([
                'user_id'=>$user->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'Specialization'=>$request->Specialization,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>'storage/Doctors/'.$newfile,
                'about'=>$request->about,
                'note'=>$request->note,
                'other_data'=>$request->other_data,
            ]);
           
        }
           
    
            toastr()->success('تم اضافه البيانات بنجاح');
            return redirect()->route('doctors.index');

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        $doctor = Doctor::where('id',$id)->first();
        if($request->image === null){
            $doctor->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'Specialization'=>$request->Specialization,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>$doctor->image,
                'about'=>$request->about,
                'note'=>$request->note,
                'other_data'=>$request->other_data,
            ]);
            $user = User::where('id',$doctor->user_id)->first();
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => bcrypt(123456789),
            ]);
        }else{
            if($request->hasfile('image')){
                $file = $request->image;
                $newfile = time().'.'. $file->getClientOriginalName();
                $file->move('storage/Doctors',$newfile); 
            } 
          
    
            $doctor = Doctor::where('id',$id)->first();
            $doctor->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'Specialization'=>$request->Specialization,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'=>'storage/Doctors/'.$newfile,
                'about'=>$request->about,
                'note'=>$request->note,
                'other_data'=>$request->other_data,
            ]);
            $user = User::where('id',$doctor->user_id)->first();
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => bcrypt(123456789),
            ]);
        }

      

        
        toastr()->success('تم اضافه البيانات بنجاح');
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        
    }
}
