<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InStorage | @yield('title')</title>
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.6.0/jquery.marquee.min.js" type="text/javascript"></script>

</head>
<body class="text-white bg-dark">
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <!-- Start Sidebar -->
            <div class="col-2 col-md-3 col-xl-2 px-sm-2 ps-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 pe-1 text-white min-vh-100">
                    <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-4 pt-3 d-none d-sm-inline" style="color:#f39c12 !important">InStorage</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link link-light align-middle px-0">
                                <i class="fs-4 bi-house" style="color:#36a2eb !important"></i>
                                <span class="ms-1 d-none d-sm-inline" style="color:#a1b6c8 !important">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link link-light px-0 align-middle">
                                <i class="fs-4 bi-briefcase" style="color:#ffcd56 !important"></i>
                                <span class="ms-1 d-none d-sm-inline" style="color:#a1b6c8 !important">Materials</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{action([\App\Http\Controllers\ScoreController::class, 'get_web'])}}" class="nav-link link-light px-0 align-middle">
                                <i class="fs-4 bi-file-earmark-text" style="color:#35df91 !important"></i>
                                <span class="ms-1 d-none d-sm-inline" style="color:#a1b6c8 !important">Scores</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{action([\App\Http\Controllers\EmployeeController::class, 'get_web'])}}" class="nav-link link-light px-0 align-middle">
                                <i class="fs-4 bi-people" style="color:#ff6384 !important"></i>
                                <span class="ms-1 d-none d-sm-inline" style="color:#a1b6c8 !important">Employees</span>
                            </a>
                        </li>
                    </ul>

                    <hr>

                    <!-- Start Currency Prices Line -->
{{--                    <div class="marquee ms-1 " style='overflow:hidden; max-width: 122px;'>--}}
{{--                            <pre class="mb-0 d-none d-sm-inline">--}}
{{--                                {{\App\Services\CurrencyService::output_currencies()}}--}}
{{--                            </pre>--}}
{{--                    </div>--}}
                    <!-- End Currency Prices Line -->

                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color:#a1b6c8 !important">
                            <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">kot.oleksii</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
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
            <div class="col col-md-9 ms-3 py-3 pt-4">
                @yield('main_content')
            </div>
            <!-- End Content Block -->
        </div>
    </div>

{{--    <main>--}}
{{--        <div class="row">--}}
{{--            <div class="container-fluid">--}}

{{--                <!-- Start NAV Mobile Menu -->--}}
{{--                <nav class="navbar navbar-expand-sm navbar-dark bg-dark pt-2 pb-0 d-sm-none d-md-block">--}}
{{--                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">--}}
{{--                        <span class="navbar-toggler-icon"></span>--}}
{{--                    </button>--}}
{{--                    <div class="offcanvas offcanvas-start bg-dark w-50" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">--}}
{{--                        <div class="offcanvas-header pb-0">--}}
{{--                            <a href="/" class="text-decoration-none">--}}
{{--                                <span class="fs-4 nav-link text-white px-1">InStorage</span>--}}
{{--                            </a>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}

{{--                            <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">--}}
{{--                                <svg class="bi" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>--}}
{{--                                <span class="visually-hidden">Icon-only</span>--}}
{{--                            </a>--}}

{{--                        </div>--}}
{{--                        <div class="offcanvas-body pt-0">--}}
{{--                            @include('sidebar')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}

{{--            <!-- End NAV Mobile Menu -->--}}
{{--            <div class="row">--}}
{{--                <!-- Start Sidebar -->--}}
{{--                <div class="col-md-2 ms-3 mt-3 me-0 d-none d-sm-block">--}}
{{--                    <div class="d-flex flex-column flex-shrink-0 text-white bg-dark">--}}
{{--                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">--}}
{{--                            <span class="fs-4 nav-link text-white px-1">InStorage</span>--}}
{{--                        </a>--}}
{{--                        <hr>--}}
{{--                        <ul class="nav nav-pills flex-column mb-auto list-unstyled ps-0">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link active" aria-current="page">--}}
{{--                                    <i class="bi-house-door-fill" role="img"></i>--}}
{{--                                    Home--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link text-white">--}}
{{--                                    <i class="bi-briefcase-fill" role="img"></i>--}}
{{--                                    Materials--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <hr>--}}

{{--                        <div class="marquee" style='overflow:hidden'>--}}
{{--                                <pre class="mb-0">--}}
{{--                                    {{\App\Services\CurrencyService::output_currencies()}}--}}
{{--                                </pre>--}}
{{--                        </div>--}}

{{--                        <div class="dropdown">--}}
{{--                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="" width="32" height="32" class="rounded-circle me-2">--}}
{{--                                <strong>kot.oleksii</strong>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">--}}
{{--                                <li><a class="dropdown-item" href="#">Profile</a></li>--}}
{{--                                <li><hr class="dropdown-divider"></li>--}}
{{--                                <li><a class="dropdown-item" href="#">Sign out</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Sidebar -->--}}

{{--                <!-- Start Content -->--}}
{{--                <div class="col-md-9 col-sm-10 col-lg-9 col-10 py-4 ms-5">--}}
{{--                    @yield('main_content')--}}
{{--                </div>--}}
{{--                <!-- End Content -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $('.marquee').marquee({
                duration: 10000,
                gap: 0,
                delayBeforeStart: 0,
                duplicated: true,
                pauseOnHover: true,
                startVisible: true,
            });
        });
    </script>

{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                $('select').selectize({--}}
{{--                    // sortField: 'text'--}}
{{--                }); }--}}
{{--            );--}}
{{--        </script>--}}


        <script type="text/javascript">
            $("#date_start").datepicker( {
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
            });
        </script>
</body>
</html>
