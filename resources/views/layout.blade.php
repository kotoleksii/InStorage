<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

{{--    <link rel="stylesheet" href="{{ asset('/css/moving.css') }}">--}}

    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.6.0/jquery.marquee.min.js" type="text/javascript"></script>

</head>
<body class="text-white bg-dark">
    <main>
        <div class="container-fluid">
            <!-- Start NAV Mobile Menu -->
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark pt-2 pb-0 d-sm-none d-md-block">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start bg-dark w-50" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header pb-0">
                        <a href="/" class="text-decoration-none">
                            <span class="fs-4 nav-link text-white px-1">InStorage</span>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body pt-0">
                        @include('sidebar')
                    </div>
                </div>
            </nav>
            <!-- End NAV Mobile Menu -->
            <div class="row">
                <!-- Start Sidebar -->
                <div class="col-md-2 ms-3 mt-3 me-0 d-none d-sm-block">
                    <div class="d-flex flex-column flex-shrink-0 text-white bg-dark">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-4 nav-link text-white px-1">InStorage</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
                            <li class="nav-item">
                                <a href="{{action([\App\Http\Controllers\MainController::class, 'home'])}}" class="nav-link active" aria-current="page">
                                    <i class="bi-house-door-fill" role="img"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link text-white">
                                    <i class="bi-briefcase-fill" role="img"></i>
                                    Materials
                                </a>
                            </li>
                        </ul>
                        <hr>

                        <div class="marquee" style='overflow:hidden'>
                                <pre class="mb-0">
                                    {{\App\Services\CurrencyService::output_currencies()}}
                                </pre>
                        </div>

                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14GjDolQFVZiV8o5ceYRox7vuRGYHjJzQ6LksIG9q=s288-p-rw-no" alt="" width="32" height="32" class="rounded-circle me-2">
                                <strong>kot.oleksii</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->

                <!-- Start Content -->
                <div class="col-md-9 col-sm-10 col-lg-9 col-10 py-4 ms-5">
                    @yield('main_content')
                </div>
                <!-- End Content -->
            </div>
        </div>
    </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" ></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(function() {
            $('.marquee').marquee({
                duration: 15000,
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
