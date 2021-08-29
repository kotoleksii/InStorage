<div class="container-fluid overflow-hidden">
    <!-- Start Sidebar -->
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-lg-3 col-xl-2 px-sm-2 px-0 d-flex sticky-top" style="background-color: #111520">
            <div class="d-flex flex-lg-column flex-row flex-grow-1 align-items-center align-items-lg-start px-3 pt-2 text-white">
                <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 pt-3"><img src="{{asset('images/logo2.png')}}" alt="logo" width="33" height="36"><span class="pt-3 d-none d-lg-inline"> InStorage</span></span>
                </a>
                <ul class="nav nav-pills flex-lg-column flex-row flex-nowrap flex-shrink-1 flex-lg-grow-0 flex-grow-1 mb-lg-auto mb-0 justify-content-center align-items-center align-items-lg-start" id="menu">
                    <li class="nav-item">
                        <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link px-lg-0 px-2">
                            <i class="fs-4 bi-house" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-lg-inline text-white">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link px-lg-0 px-2">
                            <i class="fs-4 bi-briefcase" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-lg-inline text-white">Materials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\ScoreController::class, 'get_web'])}}" class="nav-link px-lg-0 px-2">
                            <i class="fs-4 bi-file-earmark-text" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-lg-inline text-white">Scores</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\EmployeeController::class, 'get_web'])}}" class="nav-link px-lg-0 px-2">
                            <i class="fs-4 bi-people" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-lg-inline text-white">Employees</span>
                        </a>
                    </li>
                </ul>

                <hr>

                <!-- Start Currency Prices Line -->
                <div class="marquee ms-1 d-none d-lg-inline" style='overflow:hidden; max-width: 122px;'>
                        <pre class="mb-0 ">
                            {{\App\Services\CurrencyService::output_currencies()}}
                        </pre>
                </div>
                <!-- End Currency Prices Line -->

                <div class="dropdown py-lg-4 mt-lg-auto ms-auto ms-lg-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-lg-inline mx-1">kot.oleksii</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="background-color: #1d2636">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Start Content Block -->
        <div class="col d-flex flex-column h-lg-100">
            <main class="row overflow-auto">
                <div class="col pt-5 mt-4">
                    @yield('main_content')
                </div>
            </main>
            <footer class="row text-center py-0 mt-auto">
                <div class="col">
                    <a href="https://www.instagram.com/kot.oleksii/" class="nav-link px-sm-0 px-2">
                        <i class="fs-6 bi-instagram" style="color:#1776d4"></i>
                        <span class="ms-1 text-secondary">for communication</span>
                    </a>
                </div>
            </footer>
        </div>
        <!-- End Content Block -->
    </div>
</div>
