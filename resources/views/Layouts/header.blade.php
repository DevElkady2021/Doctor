<!doctype html>
<html lang="en" dir="rtl" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    @include('Layouts.head')
  

    
</head>

<body style="background-color: #ecf0ec;">

   <div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg fs-3 navbar-dark bg-dark bg-gradient p-3">
            <div class="container-fluid">
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-3">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">الرئيسيه ||</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('patients.index') }}">المرضى || </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visits.index') }}">الزيارات || </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('prouduts.index') }}">الاصناف || </a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">تقارير  </a>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </nav>
    </div>
   </div>


   
    @yield('content')
    @include('sweetalert::alert')
    @include('Layouts.footer-script')
</body>

</html>
