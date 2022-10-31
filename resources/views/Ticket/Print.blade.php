@extends('Layouts.header')
@section('title', 'معاينه الطباعه ')

@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>


@endsection
@section('title')
    معاينه طباعة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الروشته</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="container">
        <div class="row ">
            <div class="col-md-12 col-xl-12">
                <div class=" main-content-body-invoice" id="print">
                    <div class="card card-invoice">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <h5>
                                    دكتور / ........
                                    <br><br><br>
                                    دكتوراه فى ..........
                                    <br><br><br>
                                ...................
                                        </h5>
                                             
                                         </div>
                                         
                                    <div class="col-4">
                                   <h5>
                                    <img width="210"
                                                src="https://seeklogo.com/images/H/hospital-clinic-plus-logo-7916383C7A-seeklogo.com.png" />
                                   </h5>
                                        
                                    </div>
                                    <div class="col-4">
                                        <h5>
                                            اسم المريض : {{ $visit->patient->name }} 
                                            <br><br> <br><br><br>
                                       التاريخ :   {{ $visit->date }}
                                        </h5>
                                  
                                    </div>
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-4">
                                        <h5>
                                      
                                        </h5>
                                  
                                    </div>
                                </div>
                            </div>
                            
                           
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th class="text-center"> </th>
                                    <th class="text-center"> </th>
                                    <th><span style="font-size: 3em;">R<sub>x</sub></span></th>
                                    
                                 

                                </tr>
                                
                            </thead>
                            <tbody >
                              
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center" >{{ $product->dose }}</td>
                                        <td class="text-center" >{{ $product->name }}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="card-footer text-center">
                          القاهره - القاهره 
                          <p>
                            مع تمانياتنا بالشفاء العاجل 
                          </p>
                          </div>
                    <button class="btn btn-danger  float-left mt-3 mr-2 p-3" id="print_Button" onclick="printDiv()"> <i
                            class="mdi mdi-printer ml-1"></i>طباعة</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
   

 




@endsection
@section('scripts')

   
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
