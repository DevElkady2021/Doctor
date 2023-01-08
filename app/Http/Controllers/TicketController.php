<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\patient;
use App\Models\Product;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = patient::get();
        $visits = Visit::get();
        $products = Product::get();
        return view('Ticket.index',compact('visits','patients','products'));
      
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::where('visit_id',$id)->get();
        $patients = patient::get();
        $products = Product::get();
        $visit = Visit::where('id',$id)->first();
        return view('Ticket.Print',compact('visit','patients','products','ticket'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visit = Visit::find($id);
        $products = Product::get();
       
        return view('Ticket.index',compact('products','visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $visit = Visit::find($id);
        $id = $request->visit_id;
        $product =$request->product_id;
        $dose =$request->dose;
             for ($i=0; $i<count($product); $i++){
                Ticket::create([
                    'visit_id'=>$id[$i],
                    'product_id'=>$product[$i],
                     'dose'=>$dose[$i],
                ]);
                $visit->update([
                    'status'=>1,
                ]);

             }
             return redirect()->route('visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
