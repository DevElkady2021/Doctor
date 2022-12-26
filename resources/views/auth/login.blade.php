<!doctype html>
<html lang="en">

<!-- Mirrored from www.kodingwife.com/demos/wafi-admin/dashboard-v2/topbar-rtl/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Nov 2022 11:32:31 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>عيادتى - تسجيل دخول</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
</head>

<body>

    <!-- Container start -->
    <div class="container">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="{{ asset('public/img/kadi-logo-v2-sm.png') }}" alt="{{ config('app.name') }}" />
                              
                            </a>
                            <h3 class="mx-5 text-primary ">{{ config('app.name') }}</h3>
                            <h5>مرحبا بعودتك ,,, <br /></h5>
                            <div class="form-group">
                                <label for="email" class="form-label text-md-end">البريد الالكترونى</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label text-md-end">كلمه المرور</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="btn btn-primary my-3 w-100 p-2">دخول</button>	
                            </div>
                        </div>

                    </div>
                  
                </div>

            </div>
    </div>

    </div>
    </form>

    </div>
    <!-- Container end -->

</body>

</html>






















