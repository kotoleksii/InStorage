@extends('layout')

@section('title')
    | Materials
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


{{--    <div id="qrcode"></div>--}}

    <!-- Start Modal QR -->
    <div class="modal hide fade" id="QRModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                    <div class="d-grid gap-0 d-md-flex justify-content-md-end">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="qrform">
                        <div class="p-2 mb-0 rounded" style="background-color: #151b27">
                            <div class="card-body p-0">
                                <div style="display: flex; justify-content: center; text-align: center; margin: 0;" id="qrcode"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal QR -->


    <form method="get" action="">
            <div class="nav nav-pills flex-column mb-auto list-unstyled ps-0">
                <a href="" class="text-center nav-link text-white rounded pt-0" data-bs-toggle="modal" data-bs-target="#createModal" role="button" aria-expanded="true">
                    <i class="fs-4 bi-plus-circle" style="color:#508fcd;"></i>
                    <span class="ms-1 fs-3">Materials</span>
                </a>
            </div>

            <hr>

            <div class="collapse show text-white" id="HideOptions">
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
                        <button type="submit" class="btn col-12 text-white" style="height: 35px; background-color: #276899">Find</button>
                    </div>
                </div>
            </div>

            <!-- Start Spinner -->
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"></div>
            </div>
            <!-- End Spinner -->

            @if (isset($_GET["employee_select"]) && isset($_GET["score_select"]))
                @foreach($employees->where('id', '=', $_GET["employee_select"]) as $employee_title)
                    @foreach($scores->where('id', '=', $_GET["score_select"]) as $score_title)
                        <div class="row">
                            <div class="col">
                                <a href="#HideOptions" class="text-center nav-link text-white rounded px-0 py-0 mx-0 my-0" data-bs-toggle="collapse" data-bs-target="#HideOptions" role="button" aria-expanded="true">
                                    <div class="col-xs-1 text-center">
                                        <div class="alert alert-secondary" data-bs-toggle="tooltip" title="Press to Hide Options">
                                            <h3>{{$employee_title->description}}</h3>
                                            <h4>{{$score_title->title}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <hr>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap" style="width:100%">
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
                        </div>
                    @endforeach
                @endforeach
            @endif

            @if(isset($_GET["employee_select"]) && empty($_GET["score_select"]))
                @foreach($employees->where('id', '=', $_GET["employee_select"]) as $employee_title)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#HideOptions" class="text-center nav-link text-white rounded px-0 py-0 mx-0 my-0" data-bs-toggle="collapse" data-bs-target="#HideOptions" role="button" aria-expanded="true">
                                <div class="col-xs-1 text-center">
                                    <div class="alert alert-secondary" data-bs-toggle="tooltip" title="Press to Hide Options">
                                        <h3>{{$employee_title->description}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap" style="width:100%">
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
                    </div>
                @endforeach
            @endif

            @if(isset($_GET["score_select"]) && empty($_GET["employee_select"]))
                @foreach($scores->where('id', '=', $_GET["score_select"]) as $score_title)
                    <div class="row">
                        <div class="col">
                            <a href="#HideOptions" class="text-center nav-link text-white rounded px-0 py-0 mx-0 my-0" data-bs-toggle="collapse" data-bs-target="#HideOptions" role="button" aria-expanded="true">
                                <div class="col-xs-1 text-center">
                                    <div class="alert alert-secondary" data-bs-toggle="tooltip" title="Press to Hide Options">
                                        <h3>{{$score_title->title}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap" style="width:100%">
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
                                        <td>{{$employee->last_name}} {{$employee->first_name}}</td>
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
                    </div>
                @endforeach
            @endif


                @if(empty($_GET["employee_select"]) && empty($_GET["score_select"]))
                <div class="row">
                    <div class="col">
                        <a href="#HideOptions" class="text-center nav-link text-white rounded px-0 py-0 mx-0 my-0" data-bs-toggle="collapse" data-bs-target="#HideOptions" role="button" aria-expanded="true">
                            <div class="col-xs-1 text-center">
                                <div class="alert alert-secondary" data-bs-toggle="tooltip" title="Press to Hide Options">
                                    <h3>Please use select option</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
    </form>

        <!-- Start Modal Create -->
        <div class="modal hide fade" id="createModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color: #151b27">
                    <div class="card shadow modal-body rounded" style="background-color: #151b27">
                        <form action="{{route('create_material')}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            @csrf
                            <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                                <div class="card-body p-2">

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <p class="text-center fs-3 card-title" style="color: #a2bdd8">New Material</p>

                                    <div class="mb-2">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 mb-2">
                                            <div class="row">
                                                <div class="col-7 col-sm-7">
                                                    <label for="inventory_number" class="form-label">Inventory Number</label>
                                                    <input type="text" name="inventory_number" id="inventory_number" class="form-control">
                                                </div>
                                                <div class="col-5 col-sm-5">
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
                                                <div class="col-6 col-sm-7">
                                                    <label for="employee_id" class="form-label">Employee</label>

                                                    <select name="employee_id" id="employee_id" aria-label="Employee list">
                                                        <option value="">Select Employee</option>
                                                        @foreach($employees as $employee)
                                                            <option value="{{$employee->id}}">{{$employee->id}} {{$employee->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 col-sm-5">
                                                    <label for="score_id" class="form-label">Score</label>

                                                    <select name="score_id" id="score_id" aria-label="Employee list">
                                                        <option value="">Select Score</option>
                                                        @foreach($scores as $score)
                                                            <option value="{{$score->id}}">{{$score->id}} {{$score->title}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-12">
                                        <button type="submit" class="btn btn-lg shadow text-white" style="background-color: #276899;" name="btn_add">Create</button>
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
                    // "scrollX": true,
                    lengthMenu: [5, 10, 20, 50],
                    // "order": [[ 0, "desc" ]],
                } );
            } );
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                let table = $('#datatable').DataTable();

                $('#datatable tbody').on('dblclick', 'tr', function () {
                    let data = table.row(this).data();

                    let dataQr = `ID: ${data[0]}; Назва: ${data[1]}; Інвентарний: ${data[2]}; Кількість: ${data[5]}; Ціна: ${data[6]}`;

                    clearBox('qrcode');

                    new QRCode(document.getElementById('qrcode'), {
                        text: 'проба',
                        // width: 128,
                        // height: 128,
                        colorDark: '#000',
                        colorLight: '#fff',
                        correctLevel: QRCode.CorrectLevel.H
                    });

                    $("#QRModal").modal('show');
                });
            });
            function clearBox(elementID)
            {
                document.getElementById(elementID).innerHTML = "";
            }
        </script>
    @endsection
