{{--<div class="row col-md-12" id="sidebar">--}}
{{--    <div class="col-md-2 mx-3 mt-3 me-0 d-none d-sm-block">--}}
{{--<div class="d-flex flex-column flex-shrink-0 text-white bg-dark">--}}
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

        {{--                    <li class="mb-1">--}}
        {{--                        <a href="#collapseExample" class="nav-link text-white align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#collapseExample" role="button" aria-expanded="true">--}}
        {{--                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>--}}
        {{--                                Materials--}}
        {{--                        </a>--}}
        {{--                        <div class="collapse show text-white" id="collapseExample">--}}
        {{--                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">--}}
        {{--                                <li>--}}
        {{--                                    <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_overview'])}}" class="nav-link text-white">--}}
        {{--                                        Overview--}}
        {{--                                    </a>--}}
        {{--                                </li>--}}
        {{--                                <li>--}}
        {{--                                    <a href="" class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#createModal">--}}
        {{--                                        Create--}}
        {{--                                    </a>--}}
        {{--                                </li>--}}
        {{--                                <li>--}}
        {{--                                    <a href="{{action([\App\Http\Controllers\MaterialController::class, 'get_web'])}}" class="nav-link text-white">--}}
        {{--                                       Find--}}
        {{--                                    </a>--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}

        {{--                        </div>--}}
        {{--                    </li>--}}
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
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
{{--    </div>--}}
{{--</div>--}}

