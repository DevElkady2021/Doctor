@extends('home')
@section('title','الرئيسيه')
@section('page', 'الرئيسيه ')
@section('content')

	<!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card-title"></div>
        </div>
						
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public/img/slider/3.jpg') }}" class="rounded d-block w-100" alt="Carousel">
                        <div class="carousel-caption d-none d-md-block text-danger">
                            <h1>عيادتى الجميله</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/img/slider/2.jpg') }}" class="rounded d-block w-100" alt="Carousel">
                        <div class="carousel-caption d-none d-md-block text-danger">
                            <h1>عيادتى الجميله</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public/img/slider/1.jpg') }}" class="rounded d-block w-100" alt="Carousel">
                        <div class="carousel-caption d-none d-md-block text-danger">
                            <h1>عيادتى الجميله</h1>
                        </div>
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
        </div>
        


    </div>
    <!-- Row end -->
    
@endsection
@section('scripts')
    @include('sweetalert::alert')
@endsection