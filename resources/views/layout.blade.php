<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>InStorage @yield('title')</title>

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

    <style>
        div.dataTables_wrapper {
            width: 1050px;
            margin: 0 auto;
        }
    </style>


</head>
<body class="text-white" style="background-color: #151b27">
<div class="container-fluid overflow-hidden">
    <!-- Start Sidebar -->
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flex sticky-top" style="background-color: #111520">
            <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 pt-3"><img src="{{asset('images/logo2.png')}}" alt="logo" width="33" height="36"><span class="pt-3 d-none d-sm-inline"> InStorage</span></span>
                </a>
                <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-house" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-sm-inline text-white">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-briefcase" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-sm-inline text-white">Materials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\ScoreController::class, 'get_web'])}}" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-file-earmark-text" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-sm-inline text-white">Scores</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action([\App\Http\Controllers\EmployeeController::class, 'get_web'])}}" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-people" style="color:#1776d4"></i>
                            <span class="ms-1 d-none d-sm-inline text-white">Employees</span>
                        </a>
                    </li>
                </ul>

                <hr>

                <!-- Start Currency Prices Line -->
                <div class="marquee ms-1 d-none d-sm-inline" style='overflow:hidden; max-width: 122px;'>
                        <pre class="mb-0 ">
                            {{\App\Services\CurrencyService::output_currencies()}}
                        </pre>
                </div>
                <!-- End Currency Prices Line -->

                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">kot.oleksii</span>
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
        <div class="col d-flex flex-column ">
            <main class="row h-sm-100 vh-100">
                <div class="col pt-5 mt-4">
                    @yield('main_content')
                </div>
            </main>
        </div>
        <!-- End Content Block -->
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
{{--    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>--}}
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $('.spinner-border').hide();
        });
    </script>
</body>
</html>
