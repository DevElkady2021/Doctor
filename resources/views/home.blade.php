<!doctype html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Meta -->
		<link rel="shortcut icon" href="{{ asset('public/img/kadi-logo-v2-sm.png') }}" />
		<!-- Title -->
		<title>عيادتى - @yield('title')</title>
    @include('Layouts.head')

	</head>
	<body>
		<!-- Header start -->
		<header class="header ">
			<div class="logo-wrapper">
				<a href="{{ route('home') }}" class="logo">
					<img src="{{ asset('public/img/kadi-logo-v2-sm.png') }}" alt="Admin Dashboard" />
				</a>
			</div>
			<div class="header-items">
				<!-- Header actions start -->
				<ul class="header-actions">
					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="avatar status online">{{ Auth::user()->name }}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
							<div class="header-profile-actions">
								<div class="header-user-profile">
									<div class="header-user">
										<img src="{{ asset('public/img/kadi-logo-v2-sm.png') }}" alt="Admin Template" />
									</div>
									<h5>{{ Auth::user()->name }}</h5>
									<p>{{ Auth::user()->email }}</p>
								</div>
								<a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
								<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
								<a href="{{ route('logout') }}"><i class="icon-log-out1"></i> Sign Out</a>
							</div>
						</div>
					</li>
				</ul>						
				<!-- Header actions end -->
			</div>
		</header>
		<!-- Header end -->

		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->
		<!-- Container fluid start -->
		<div class="container-fluid">

		@include('Layouts.navbar')

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">الرئيسيه</li>
						<li class="breadcrumb-item active">@yield('page')</li>
					</ol>
				</div>
				<!-- Page header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row starts -->
					@yield('content')
					<!-- Row end -->
				</div>
				<!-- Content wrapper end -->

			</div>
			<!-- Footer start -->
			<footer class="main-footer">© Elkady 2022</footer>
			<!-- Footer end -->
		</div>
		<!-- Container fluid end -->
	@include('Layouts.footer-script')
</body>

</html>