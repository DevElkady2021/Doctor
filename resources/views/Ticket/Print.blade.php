@extends('home')
@section('title', 'طباعه الروشته ')
@section('page', 'طباعه الروشته ')


@section('css')
    <style>
        @media print {
            #print {
                display: none;
            }
        }
    </style>
@endsection

@section('content')


    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Row start -->
                <div class="row gutters bg-info">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="card_print">
                        <div class="card"
                            style='background: rgb(34,193,195);
                                                background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);'>
                            <div class="card-body p-0">
                                <div class="invoice-container">
                                    <div class="invoice-header">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="custom-actions-btns mb-5">
                                                    <a href="#" class="btn btn-dark" id="print">
                                                        <i class="icon-printer"></i> Print
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                <a class="invoice-logo">
                                                    <img src="{{ asset('public/img/icon.png') }}" alt="Doctor"
                                                        width="100" />
                                                </a>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="invoice-details">
                                                    <div class="invoice-num">
                                                        <div class="h3">
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                دكتور :</span>
                                                            {{ $visit->doctor->name }}
                                                        </div>
                                                        <div>
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                {{ $visit->doctor->Specialization }}</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> اسم المريض :</span>
                                                                {{ $visit->patient->name }}

                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> التاريخ :</span>
                                                                {{ $visit->date }}
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                    </div>

                                    <div class="invoice-body">


                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2"></span>
                                                        {{ $visit->note }}
                                                    </address>
                                                </div>
                                            </div>


                                        </div>
                                        <br>

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="text-right"> <img
                                                                        src="{{ asset('public/img/icon.png') }}"
                                                                        alt="Doctor" width="25" class="ml-5" /></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach ($ticket as $item)
                                                                <tr>
                                                                    <td>{{ $item->dose }}</td>
                                                                    <td class="text-center">
                                                                        {{ App\Models\product::where('id', $item->product_id)->first()->name }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>

                                    <div class="invoice-footer">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2"> رقم
                                                            التليفون :</span>
                                                        {{ $visit->doctor->phone }}
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2">
                                                            العنوان :</span>
                                                        {{ $visit->doctor->address }}
                                                    </address>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 h4 mt-2 mb-2">
                                                <span style="font-weight:bolder;color:black;border-bottom:3px double red;"
                                                    class="p-2">مع تمنياتنا لكم بالشفاء العاجل</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                </div>
                <!-- Row end -->
            </div>
            <div class="carousel-item bg-info">
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="card_print1">
                        <div class="card"
                            style='background: rgb(2,0,36);
                                    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);'>
                            <div class="card-body p-0">
                                <div class="invoice-container">
                                    <div class="invoice-header">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="custom-actions-btns mb-5">
                                                    <a href="#" class="btn btn-dark" id="print1">
                                                        <i class="icon-printer"></i> Print
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                <a class="invoice-logo">
                                                    <img src="{{ asset('public/img/icon.png') }}" alt="Doctor"
                                                        width="100" />
                                                </a>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="invoice-details">
                                                    <div class="invoice-num">
                                                        <div class="h3">
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                دكتور :</span>
                                                            {{ $visit->doctor->name }}
                                                        </div>
                                                        <div>
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                {{ $visit->doctor->Specialization }}</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> اسم المريض :</span>
                                                                {{ $visit->patient->name }}

                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> التاريخ :</span>
                                                                {{ $visit->date }}
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                    </div>

                                    <div class="invoice-body">


                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;"
                                                            class="mx-2"></span>
                                                        {{ $visit->note }}
                                                    </address>
                                                </div>
                                            </div>


                                        </div>
                                        <br>

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="text-right"> <img
                                                                        src="{{ asset('public/img/icon.png') }}"
                                                                        alt="Doctor" width="25" class="ml-5" />
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach ($ticket as $item)
                                                                <tr>
                                                                    <td>{{ $item->dose }}</td>
                                                                    <td class="text-center">
                                                                        {{ App\Models\product::where('id', $item->product_id)->first()->name }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>

                                    <div class="invoice-footer">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2"> رقم
                                                            التليفون :</span>
                                                        {{ $visit->doctor->phone }}
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2">
                                                            العنوان :</span>
                                                        {{ $visit->doctor->address }}
                                                    </address>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 h4 mt-2 mb-2">
                                                <span style="font-weight:bolder;color:black;border-bottom:3px double red;"
                                                    class="p-2">مع تمنياتنا لكم بالشفاء العاجل</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                </div>
                <!-- Row end -->
            </div>
            <div class="carousel-item bg-info">
             
                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="card_print2">
                        <div class="card"
                            style='background: rgb(131,58,180);
                            background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);'>
                            <div class="card-body p-0">
                                <div class="invoice-container">
                                    <div class="invoice-header">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="custom-actions-btns mb-5">
                                                    <a href="#" class="btn btn-dark" id="print2">
                                                        <i class="icon-printer"></i> Print
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                <a class="invoice-logo">
                                                    <img src="{{ asset('public/img/icon.png') }}" alt="Doctor"
                                                        width="100" />
                                                </a>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="invoice-details">
                                                    <div class="invoice-num">
                                                        <div class="h3">
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                دكتور :</span>
                                                            {{ $visit->doctor->name }}
                                                        </div>
                                                        <div>
                                                            <span style="font-weight:bolder;color:black;" class="mx-2">
                                                                {{ $visit->doctor->Specialization }}</span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> اسم المريض :</span>
                                                                {{ $visit->patient->name }}

                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="invoice-details">
                                                            <address>
                                                                <span style="font-weight:bolder;color:black;"
                                                                    class="mx-2"> التاريخ :</span>
                                                                {{ $visit->date }}
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                    </div>

                                    <div class="invoice-body">


                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;"
                                                            class="mx-2"></span>
                                                        {{ $visit->note }}
                                                    </address>
                                                </div>
                                            </div>


                                        </div>
                                        <br>

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="text-right"> <img
                                                                        src="{{ asset('public/img/icon.png') }}"
                                                                        alt="Doctor" width="25" class="ml-5" />
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            @foreach ($ticket as $item)
                                                                <tr>
                                                                    <td>{{ $item->dose }}</td>
                                                                    <td class="text-center">
                                                                        {{ App\Models\product::where('id', $item->product_id)->first()->name }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>

                                    <div class="invoice-footer">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2"> رقم
                                                            التليفون :</span>
                                                        {{ $visit->doctor->phone }}
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="invoice-details">
                                                    <address>
                                                        <span style="font-weight:bolder;color:black;" class="mx-2">
                                                            العنوان :</span>
                                                        {{ $visit->doctor->address }}
                                                    </address>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 h4 mt-2 mb-2">
                                                <span style="font-weight:bolder;color:black;border-bottom:3px double red;"
                                                    class="p-2">مع تمنياتنا لكم بالشفاء العاجل</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">



                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- ------------------------------------------ --}}

    <!-- Row start -->
    {{-- <div class="row gutters">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">

        

    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="card_print" >
        <div class="card" style='background: rgb(34,193,195);
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);'>
            <div class="card-body p-0">
                <div class="invoice-container">
                    <div class="invoice-header">

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="custom-actions-btns mb-5">
                                    <a href="#" class="btn btn-dark" id="print">
                                        <i class="icon-printer"></i> Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                <a  class="invoice-logo">
                                    <img src="{{ asset('public/img/icon.png') }}" alt="Doctor" width="100" />
                                </a>
                            </div>
                            
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="invoice-details">
                                    <div class="invoice-num">
                                        <div class="h3">
                                            <span style="font-weight:bolder;color:black;" class="mx-2"> دكتور   :</span> 
                                            {{ $visit->doctor->name }}</div>
                                        <div>
                                            <span style="font-weight:bolder;color:black;" class="mx-2"> {{ $visit->doctor->Specialization }}</span> 
                                           </div>
                                    </div>
                                    <hr>
                                </div>													
                            </div>
                          
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                               <span style="font-weight:bolder;color:black;" class="mx-2"> اسم المريض :</span> 
                                                {{ $visit->patient->name }}
                                               
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                <span style="font-weight:bolder;color:black;" class="mx-2">  التاريخ :</span> 
                                                {{ $visit->date }}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- Row end -->

                    </div>

                    <div class="invoice-body">


                            <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="invoice-details">
                                     <address>
                                         <span style="font-weight:bolder;color:black;" class="mx-2"></span> 
                                         {{ $visit->note }}
                                     </address>
                                 </div>
                             </div>
                         
                            
                            </div>
                            <br>

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-right"> <img src="{{ asset('public/img/icon.png') }}" alt="Doctor" width="25" class="ml-5"/></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                           @foreach ($ticket as $item)
                                           <tr>
                                            <td>{{ $item->dose }}</td>
                                            <td class="text-center">{{ App\Models\product::where('id',$item->product_id)->first()->name }}</td>
                                           
                                        </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                    <div class="invoice-footer">
                       <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="invoice-details">
                                <address>
                                    <span style="font-weight:bolder;color:black;" class="mx-2">  رقم التليفون :</span> 
                                    {{ $visit->doctor->phone }}
                                </address>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="invoice-details">
                                <address>
                                    <span style="font-weight:bolder;color:black;" class="mx-2">  العنوان  :</span> 
                                    {{ $visit->doctor->address }}
                                </address>
                            </div>
                        </div>
                       
                       </div>
                       <div class="row" >
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 h4 mt-2 mb-2" >
                            <span style="font-weight:bolder;color:black;border-bottom:3px double red;" class="p-2">مع تمنياتنا  لكم بالشفاء العاجل</span>
                        </div> 
                       </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">

        

    </div>
</div> --}}
    <!-- Row end -->


@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('#print').click(function() {

                $('#card_print').printThis();
            });
            $('#print1').click(function() {

                $('#card_print1').printThis();
            });
            $('#print2').click(function() {

                $('#card_print2').printThis();
            });
        });
    </script>
@endsection
