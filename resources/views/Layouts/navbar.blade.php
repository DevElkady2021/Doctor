	<!-- Navigation start -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </button>
        <div class="collapse navbar-collapse " id="WafiAdminNavbar">
            <ul class="navbar-nav">
                   <!-- Home -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active-page" href="#" id="dashboardsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-devices_other nav-icon"></i>
                        الرئيسيه
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dashboardsDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}">الرئيسيه</a>
                        </li>
                    </ul>
                </li>
                     <!-- end Home -->

                 <!-- Paitent -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-package nav-icon"></i>
                        المرضى
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('patients.index') }}">قائمه المرضى</a>
                        </li>
                    </ul>
                </li>
                <!-- end Paitent -->

                    <!-- Doctor -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-package nav-icon"></i>
                            الاطباء
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('doctors.index') }}">قائمه الاطباء</a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Doctor -->

                    <!-- visits -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-package nav-icon"></i>
                            الزيارات
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('visits.index') }}"> الزيارات </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end visits -->

                       <!-- prouduts -->
                       <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-package nav-icon"></i>
                            الاصناف
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('prouduts.index') }}"> الاصناف </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end prouduts -->

                           <!-- reports -->
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-package nav-icon"></i>
                                تقارير
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                                <li>
                                    <a class="dropdown-item" href="#"> تقارير </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end reports -->
            </ul>
        </div>
    </nav>
    <!-- Navigation end -->