@extends('home')
@section('title','الرئيسيه')
@section('page', 'الرئيسيه ')
@section('content')



            
   

    	<!-- Row start -->
        <div class="hover-gallery">
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <figure class="effect-3">
                        <img src="{{ asset('public/img/img5.jpg') }}" class="img-fluid" alt="Wafi Dashboard">
                        <figcaption>
                            <div>
                                <h2 class="text-danger">عيادتى الجميله</h2>
                            </div>
                           
                        </figcaption>			
                    </figure>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <figure class="effect-3">
                        <img src="{{ asset('public/img/img3.jpg') }}" class="img-fluid" alt="Wafi Dashboard">
                        <figcaption>
                            <div>
                                <h2>رعايه ومتابعه </h2>
                            </div>
                         
                        </figcaption>			
                    </figure>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <figure class="effect-3">
                        <img src="{{ asset('public/img/img8.jpg') }}" class="img-fluid" alt="Wafi Dashboard">
                        <figcaption>
                            <div>
                                <h2>اهتمام ونظام</h2>
                            
                            </div>
                           
                        </figcaption>			
                    </figure>
                </div>
            </div>
        </div>
        <!-- Row end -->


	
						
      
        


    
@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection