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
    <!-- row -->
    {{-- <div class="container">
        <div class="row ">
            <input type="button" value="طباعه" class="btn btn-danger w-50 m-auto " >
            <div class="col-7 m-auto" >
                <div class="card" >
                    <img src="{{ asset('public/img/icon.png') }}" class="card-img" alt="Elkady" style="opacity: .2">
                    <div class="card-img-overlay">
                        <h5 class="card-title h3" style="font-weight: bolder"><span class="h3"
                                style="font-weight: bolder">دكتور / </span> {{ $visit->doctor->name }}</h5>
                        <p class="card-text">{{ $visit->doctor->Specialization }}</p>
                        <hr style="border: 3px double ">
                        <div class="row mb-5">
                            <div class="col-9">
                                <span class="mx-1" style="font-weight: 600">اسم المريض / </span>
                                {{ $visit->patient->name }}
                            </div>
                            <div class="col-3">
                                <span class="mx-1" style="font-weight: 600">التاريخ / </span>
                                {{ $visit->date }}
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-9 m-auto">

                            </div>
                            <div class="col-3">
                                <img src="{{ asset('public/img/icon.png') }}" alt="" width="25">
                            </div>
                        </div>
                        @foreach ($ticket as $pro)
                            <div class="row text-center ">

                                <div class="col-3">
                                    <span class="mb-1 h5">{{ $pro->dose }}</span>
                                </div>

                                <div class="col-9 ">
                                    <span
                                        class="mb-1  h5">{{ app\Models\product::where('id', $pro->product_id)->first()->name }}
                                    </span>

                                </div>



                            </div>
                            <br><br>
                        @endforeach
                    </div>
                    <hr>
                    <div class="card-footer">
                        {{ $visit->doctor->address }}
                        <br><br>
                        {{ $visit->doctor->phone }}

                    </div>

                </div>



            </div>
        </div>
    </div> --}}

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">

        

    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="card_print">
        <div class="card">
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
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 m-auto">
                                <a  class="invoice-logo">
                                    <img src="{{ asset('public/img/icon.png') }}" alt="Wafi Admin Dashboard" />
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                           
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                                <div class="invoice-details">
                                    <address>
                                        {{ $visit->patient->name }}
                                        <br />
                                        {{ $visit->date }}
                                    </address>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="invoice-details">
                                    <div class="invoice-num">
                                        <div class="h3">
                                            <label for="">دكتور / </label>
                                            {{ $visit->doctor->name }}</div>
                                        <div> {{ $visit->doctor->Specialization }}</div>
                                    </div>
                                </div>													
                            </div>
                        </div>
                        <!-- Row end -->

                    </div>

                    <div class="invoice-body">

                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Product ID</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Wordpress Template
                                                    <p class="m-0 text-muted">
                                                        Reference site about Lorem Ipsum, giving information on its origins.
                                                    </p>
                                                </td>
                                                <td>#50000981</td>
                                                <td>9</td>
                                                <td>$5000.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Wafi Admin Template
                                                    <p class="m-0 text-muted">
                                                        As well as a random Lipsum generator.
                                                    </p>
                                                </td>
                                                <td>#50000126</td>
                                                <td>5</td>
                                                <td>$100.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Unify Admin Template
                                                    <p class="m-0 text-muted">
                                                        Lorem ipsum has become the industry standard.
                                                    </p>
                                                </td>
                                                <td>#50000821</td>
                                                <td>6</td>
                                                <td>$49.99</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="2">
                                                    <p>
                                                        Subtotal<br>
                                                        Shipping &amp; Handling<br>
                                                        Tax<br>
                                                    </p>
                                                    <h5 class="text-danger"><strong>Grand Total</strong></h5>
                                                </td>			
                                                <td>
                                                    <p>
                                                        $5000.00<br>
                                                        $100.00<br>
                                                        $49.00<br>
                                                    </p>
                                                    <h5 class="text-danger"><strong>$5150.99</strong></h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                    <div class="invoice-footer">
                        Thank you for your Business.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-0 col-0">

        

    </div>
</div>
<!-- Row end -->


@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
           $('#print').click(function(){
           
            $('#card_print').printThis();
           });
        });
    </script>
@endsection
