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
</head>

<body class="text-white" style="background-color: #151b27">
    <nav class="navbar navbar-expand-md navbar-dark py-1" style="background-color: #111520">
        <div class="container-fluid">
            <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="d-flex pb-3 mb-md-0 me-md-auto text-white text-decoration-none pt-3">
                <span class="fs-5"><img src="{{asset('images/logo2.png')}}" alt="logo" width="33" height="36"><span> InStorage</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-auto justify-content-center">
                    <li class="nav-item mx-3 text-center">
                        <a id="house" href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link px-md-0 px-2">
                            <i class="fs-4 bi-house d-none d-md-block" style="color:#1776d4"></i>
                            <span class="ms-1 text-white">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mx-3 text-center">
                        <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link px-md-0 px-2">
                            <i class="fs-4 bi-briefcase d-none d-md-block" style="color:#1776d4"></i>
                            <span class="ms-1 text-white">Materials</span>
                        </a>
                    </li>
                    <li class="nav-item mx-3 text-center">
                        <a href="{{action([\App\Http\Controllers\ScoreController::class, 'get_web'])}}" class="nav-link px-md-0 px-2">
                            <i class="fs-4 bi-file-earmark-text d-none d-md-block" style="color:#1776d4"></i>
                            <span class="ms-1 text-white">Scores</span>
                        </a>
                    </li>
                    <li class="nav-item mx-3 text-center">
                        <a href="{{action([\App\Http\Controllers\EmployeeController::class, 'get_web'])}}" class="nav-link px-md-0 px-2">
                            <i class="fs-4 bi-people d-none d-md-block" style="color:#1776d4"></i>
                            <span class="ms-1 text-white">Employees</span>
                        </a>
                    </li>
                    </ul>
                    <div class="dropdown my-3">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle px-2 me-auto mx-auto justify-content-center" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="hugenerd" width="28" height="28" class="rounded-circle">
                            <span class="mx-1 text-secondary">kot.oleksii</span>
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
    </nav>
    <main class="overflow-auto">
        <div class="col pt-4 px-5">
            @yield('main_content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
{{--    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>--}}
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <script>
        $('#house').click(function(){
            $(this).find('i').toggleClass('bi-house').toggleClass('bi-house-fill');
        });
    </script>

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
