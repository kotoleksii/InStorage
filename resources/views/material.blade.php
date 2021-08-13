@extends('layout')

@section('title')
    Materials
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8">--}}
                <form method="get" action="">
                    <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
                        <a href="#collapseExample1" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="collapse" data-bs-target="#collapseExample1" role="button" aria-expanded="true">
                            <h1>Materials</h1>
                        </a>
                    </div>
                    <div class="collapse show text-white" id="collapseExample1">
                    <div class="row">
                            <div class="col-md-7 mb-2">
                                <select name="employee_select" aria-label="Employee list">
                                    <option value="">Select Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->id}} {{$employee->description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-2">
                                <select name="score_select" aria-label="Employee list">
                                    <option value="">Select Score</option>
                                    @foreach($scores as $score)
                                        <option value="{{$score->id}}">{{$score->id}} {{$score->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <button type="submit" class="btn btn-primary col-12" style="height: 35px;">Find</button>
                            </div>
                        </div>
                    </div>

{{--                    <div class="d-grid gap-2 d-md-block mt-2">--}}
{{--                        <!-- Button trigger modal -->--}}
{{--                        <button type="button" class="btn btn-success me-md-4 col-2" data-bs-toggle="modal" data-bs-target="#createModal">--}}
{{--                            Create--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <br>--}}

                    @if (isset($_GET["employee_select"]) && isset($_GET["score_select"]))
                        @foreach($employees->where('id', '=', $_GET["employee_select"]) as $employee_title)
                            @foreach($scores->where('id', '=', $_GET["score_select"]) as $score_title)
                                <div class="col-xs-1 text-center">
                                    <div class="alert alert-success">
                                        <h3>{{$employee_title->description}}</h3>
                                        <h5>({{$score_title->title}})</h5>
                                    </div>
                                </div>

                                <table id="datatable" class="table table-striped table-dark table-bordered display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="row">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Inventory Number</th>
                                            <th scope="col">Date start</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sum</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($materials
                                                    -> where('employee_id', '=', $_GET["employee_select"])
                                                    -> where('score_id', '=', $_GET["score_select"]) as $material)
                                            <tr>
                                                <th scope="row">{{$material->id}}</th>
                                                <td>{{$material->title}}</td>
                                                <td>{{$material->inventory_number}}</td>
                                                <td>{{$material->date_start}}</td>
                                                <td>{{$material->type}}</td>
                                                <td>{{$material->amount}}</td>
                                                <td>{{$material->price_hr}}</td>
                                                <td>{{$material->total_sum_hr}}</td>

                                                <td>
                                                    <a class="btn btn-warning btn-sm"  href="materials/edit/{{$material->id}}">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="materials/delete/{{$material->id}}">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @endforeach
                        @endforeach
                    @endif

                    @if(isset($_GET["employee_select"]) && empty($_GET["score_select"]))
                        @foreach($employees->where('id', '=', $_GET["employee_select"]) as $employee_title)
                            <div class="col-xs-1 text-center">
                                <div class="alert alert-success">
                                    <h3>{{$employee_title->description}}</h3>
                                </div>
                            </div>

                            <table id="datatable" class="table table-striped table-dark table-bordered display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="row">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Inventory Number</th>
                                    <th scope="col">Date start</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sum</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($materials
                                            -> where('employee_id', '=', $_GET["employee_select"])
                                            as $material)
                                    <tr>
                                        <th scope="row">{{$material->id}}</th>
                                        <td>{{$material->title}}</td>
                                        <td>{{$material->inventory_number}}</td>
                                        <td>{{$material->date_start}}</td>
                                        <td>{{$material->type}}</td>
                                        <td>{{$material->amount}}</td>
                                        <td>{{$material->price_hr}}</td>
                                        <td>{{$material->total_sum_hr}}</td>
                                        @foreach($scores->where('id', '=', $material->score_id) as $score)
                                            <td>{{$score->title}}</td>
                                        @endforeach

                                        <td>
                                            <a class="btn btn-warning btn-sm"  href="materials/edit/{{$material->id}}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="materials/delete/{{$material->id}}">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endif

                    @if(isset($_GET["score_select"]) && empty($_GET["employee_select"]))
                        @foreach($scores->where('id', '=', $_GET["score_select"]) as $score_title)
                            <div class="col-xs-1 text-center">
                                <div class="alert alert-success">
                                    <h3>{{$score_title->title}}</h3>
                                </div>
                            </div>

                            <table id="datatable" class="table table-striped table-dark table-bordered display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="row">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Inventory Number</th>
                                    <th scope="col">Date start</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sum</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($materials
                                           -> where('score_id', '=', $_GET["score_select"])
                                            as $material)
                                    <tr>
                                        <th scope="row">{{$material->id}}</th>
                                        <td>{{$material->title}}</td>
                                        <td>{{$material->inventory_number}}</td>
                                        <td>{{$material->date_start}}</td>
                                        <td>{{$material->type}}</td>
                                        <td>{{$material->amount}}</td>
                                        <td>{{$material->price_hr}}</td>
                                        <td>{{$material->total_sum_hr}}</td>
                                        @foreach($employees->where('id', '=', $material->employee_id) as $employee)
                                            <td>{{$employee->description}}</td>
                                        @endforeach

                                        <td>
                                            <a class="btn btn-warning btn-sm"  href="materials/edit/{{$material->id}}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="materials/delete/{{$material->id}}">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    @endif

                    @if(empty($_GET["employee_select"]) && empty($_GET["score_select"]))
                        <div class="col-xs-1 text-center">
                            <div class="alert alert-warning">
                                <h3>Please use select option</h3>
                            </div>
                        </div>
                    @endif

            </form>


{{--            <div class="col-md-3 mx-auto">--}}

                <!-- Start Modal Create -->
                <div class="modal hide fade" id="createModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="card shadow modal-body bg-dark rounded">
                                <form action="{{action([\App\Http\Controllers\MaterialController::class, 'create_web'])}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                    @csrf
                                    <div class="p-2 mb-1 bg-dark rounded">
                                        <div class="card-body p-2">

                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <h4 class="text-center card-title text-success">New Material</h4>

                                            <div class="mb-2">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" id="title" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-4 col-sm-7">
                                                            <label for="inventory_number" class="form-label">Inventory Number</label>
                                                            <input type="text" name="inventory_number" id="inventory_number" class="form-control">
                                                        </div>
                                                        <div class="col-4 col-sm-5">
                                                            <label for="date_start" class="form-label">Date Start</label>

                                                        <!-- Date Picker Input -->
                                                            <input type="text" class="form-control" name="date_start" id="date_start"/>
                                                       <!-- DEnd ate Picker Input -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 mb-2">
                                                    <div class="row">

                                                        <div class="col-4 col-sm-5">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="text" name="price" id="price" class="form-control">
                                                        </div>

                                                        <div class="col-4 col-sm-4">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="text" name="amount" id="amount" class="form-control">
                                                        </div>

                                                        <div class="col-4 col-sm-3">
                                                            <label for="type" class="form-label">Type</label>
                                                            <select name="type" id="type" aria-label="Type list">
                                                                <option>шт.</option>
                                                                <option>компл.</option>
                                                                <option>м.</option>
                                                                <option>кг.</option>
                                                                <option>мп.</option>
                                                                <option>пар.</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 mb-4">
                                                    <div class="row">
                                                        <div class="col-4 col-sm-7">
                                                            <label for="employee_id" class="form-label">Employee</label>

                                                            <select name="employee_id" id="employee_id" aria-label="Employee list">
                                                                <option value="">Select Employee</option>
                                                                @foreach($employees as $employee)
                                                                    <option value="{{$employee->id}}">{{$employee->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-4 col-sm-5">
                                                            <label for="score_id" class="form-label">Score</label>

                                                            <select name="score_id" id="score_id" aria-label="Employee list">
                                                                <option value="">Select Score</option>
                                                                @foreach($scores as $score)
                                                                    <option value="{{$score->id}}">{{$score->title}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 col-12">
                                                <button type="submit" class="btn btn-outline-success btn-lg" name="btn_add">Create</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                <!-- End Modal Create -->

                    <script>
                        $(document).ready(function () {
                            $('select').selectize({
                                // sortField: 'text'
                            }); }
                        );
                    </script>

                    <script type="text/javascript">
                        $("#date_start").datepicker( {
                            format: "mm-yyyy",
                            startView: "months",
                            minViewMode: "months",
                            autoclose: true,
                        });

                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#datatable').DataTable( {
                                "scrollX": true,
                                lengthMenu: [5, 10, 20, 50],
                                // "order": [[ 0, "desc" ]],
                            } );
                        } );
                    </script>

                    <script>
                        $(document).ready(function() {
                            let table = $('#datatable').DataTable();

                            $('#datatable tbody').on('dblclick', 'tr', function () {
                                let data = table.row(this).data();
                                alert( 'You clicked on '+data[0]+'\'s row' );
                            } );
                        } );
                    </script>

    @endsection
