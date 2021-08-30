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

    <!-- Start Modal Edit Material -->
    <div class="modal hide fade" id="updateMaterialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                    <form action="{{route('update_material')}}" method="POST">
                        @csrf
                        <input type="hidden" id="material_id" name="material_id" value="">
                        <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                            <div class="card-body p-2">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <p class="text-center fs-3 card-title" style="color: #a2bdd8">Edit Material</p>

                                <div class="mb-2">
                                    <label for="e_title" class="form-label">Title</label>
                                    <input type="text" name="title" id="e_title" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <div class="row">
                                            <div class="col-7 col-sm-7">
                                                <label for="e_inventory_number" class="form-label">Inventory Number</label>
                                                <input type="text" name="inventory_number" id="e_inventory_number" class="form-control">
                                            </div>
                                            <div class="col-5 col-sm-5">
                                                <label for="e_date_start" class="form-label">Date Start</label>

                                                <!-- Date Picker Input -->
                                                <input type="text" class="form-control" name="date_start" id="e_date_start"/>
                                                <!-- DEnd ate Picker Input -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <div class="row">

                                            <div class="col-4 col-sm-5">
                                                <label for="e_price" class="form-label">Price</label>
                                                <input type="text" name="price" id="e_price" class="form-control">
                                            </div>

                                            <div class="col-4 col-sm-4">
                                                <label for="e_amount" class="form-label">Amount</label>
                                                <input type="text" name="amount" id="e_amount" class="form-control">
                                            </div>

                                            <div class="col-4 col-sm-3">
                                                <label for="e_type" class="form-label">Type</label>
                                                <select name="type" id="e_type" aria-label="Type list">
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

                                <div class="d-grid gap-2 col-12 mt-4">
                                    <button type="submit" class="btn btn-lg shadow text-white" style="background-color: #276899;" name="btn_upd">Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit Score -->

    <!-- Start Modal Delete Material -->
    <div class="modal hide fade" id="deleteMaterialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #151b27">
                <div class="card shadow modal-body rounded" style="background-color: #151b27">
                    <form action="{{route('delete_material')}}" method="POST">
                        @method('delete')
                        @csrf
                        <div class="p-2 mb-1 rounded" style="background-color: #151b27">
                            <div class="card-body p-2">
                                <div class="modal-body">
                                    <input type="hidden" id="mat_id" name="material_id" value="">
                                    <p class="text-center materials_length"></p>
                                </div>
                                <div class="d-grid gap-2 col p-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                    <button type="submit" class="btn btn-danger shadow-sm" name="btn_del" id="btn_del">Yes, Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete Material -->


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
                                            <th scope="row" class="id_material">{{$material->id}}</th>
                                            <td class="title">{{$material->title}}</td>
                                            <td class="inventory_number">{{$material->inventory_number}}</td>
                                            <td class="date_start">{{$material->date_start}}</td>
                                            <td class="type">{{$material->type}}</td>
                                            <td class="amount">{{$material->amount}}</td>
                                            <td class="price">{{$material->price}}</td>
                                            <td class="sum">{{$material->sum}}</td>

                                            <td>
                                                <a href="" class="btn btn-warning btn-sm materialsEdits" data-bs-toggle="modal" data-bs-target="#updateMaterialModal">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm materialsDeletes" id="deleteMaterial" data-matid="{{$material->id}}" data-bs-toggle="modal" data-bs-target="#deleteMaterialModal">
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
                        <table id="datatable" class="table table-striped table-dark table-bordered table-hover display nowrap table-sm" style="width:100%">
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
                                    <th scope="row" class="id_material">{{$material->id}}</th>
                                    <td class="title">{{$material->title}}</td>
                                    <td class="inventory_number">{{$material->inventory_number}}</td>
                                    <td class="date_start">{{$material->date_start}}</td>
                                    <td class="type">{{$material->type}}</td>
                                    <td class="amount">{{$material->amount}}</td>
                                    <td class="price">{{$material->price}}</td>
                                    <td class="sum">{{$material->sum}}</td>
                                    @foreach($scores->where('id', '=', $material->score_id) as $score)
                                        <td>{{$score->title}}</td>
                                    @endforeach

                                    <td>
                                        <a href="" class="btn btn-warning btn-sm materialsEdits" data-bs-toggle="modal" data-bs-target="#updateMaterialModal">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm materialsDeletes" id="deleteMaterial" data-matid="{{$material->id}}" data-bs-toggle="modal" data-bs-target="#deleteMaterialModal">
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
                                    <th scope="row" class="id_material">{{$material->id}}</th>
                                    <td class="title">{{$material->title}}</td>
                                    <td class="inventory_number">{{$material->inventory_number}}</td>
                                    <td class="date_start">{{$material->date_start}}</td>
                                    <td class="type">{{$material->type}}</td>
                                    <td class="amount">{{$material->amount}}</td>
                                    <td class="price">{{$material->price}}</td>
                                    <td class="sum">{{$material->sum}}</td>
                                    @foreach($employees->where('id', '=', $material->employee_id) as $employee)
                                        <td>{{$employee->last_name}} {{$employee->first_name}}</td>
                                    @endforeach

                                    <td>
                                        <a href="" class="btn btn-warning btn-sm materialsEdits" data-bs-toggle="modal" data-bs-target="#updateMaterialModal">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm materialsDeletes" id="deleteMaterial" data-matid="{{$material->id}}" data-bs-toggle="modal" data-bs-target="#deleteMaterialModal">
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
            $(document).on('click', '.materialsEdits', function(){
                let _this = $(this).parents('tr');
                $('#material_id').val(_this.find('.id_material').text());
                $('#e_title').val(_this.find('.title').text());
                $('#e_inventory_number').val(_this.find('.inventory_number').text());
                $('#e_date_start').val(_this.find('.date_start').text());
                $('#e_type').val(_this.find('.type').text());
                $('#e_amount').val(_this.find('.amount').text());
                $('#e_price').val(_this.find('.price').text());
            });
        </script>

        <script>
            $('#deleteMaterialModal').on('show.bs.modal', async function (event) {
                let button = $(event.relatedTarget);

                let mat_id = button.data('matid');
                let modal = $(this);

                modal.find('.modal-body #mat_id').val(mat_id);


                await renderMaterials(mat_id);
            });
            async function getMaterials(url) {
                try {
                    let res = await fetch(url);
                    return await res.json()
                } catch (error) {
                    console.log(error);
                }
            }
            async function renderMaterials(mat_id) {
                let url = `api/materials/`;
                let materials = await getMaterials(url);
                let materialsFiltered = materials.filter(value => value.id === mat_id);
                // let scoresFilteredLength = scoresFiltered.length;
                let html = '';

               materialsFiltered
                    .forEach(material => {
                        let htmlSegment = `Are you sure you want to delete <b>${material.title}</b> (${material.id})?`
                        html += htmlSegment;
                    });

                let container = document.querySelector('.materials_length');
                container.innerHTML = html;
            }
        </script>

        <script>
            $(document).ready(function () {
                $('select').selectize({
                    // sortField: 'text'
                });
            });
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
                    // "iDisplayLength": -1,
                    "bPaginate": true,
                    "iCookieDuration": 60,
                    "bStateSave": false,
                    "bAutoWidth": false,
                    //true
                    "bScrollAutoCss": true,
                    "bProcessing": true,
                    "bRetrieve": true,
                    "bJQueryUI": true,
                    //"sDom": 't',
                    "sDom": '<"H"CTrf>t<"F"lip>',
                    lengthMenu: [5, 10, 20, 50],
                    // "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                    //"sScrollY": "500px",
                    // "sScrollX": "100%",
                    // "sScrollXInner": "110%",
                    "fnInitComplete": function() {
                        this.css("visibility", "visible");
                    },
                    // "scrollX": true,
                    // "order": [[ 0, "desc" ]],
                } );
            } );
        </script>

       <script type="text/javascript">
            $(document).ready(function() {
                let table = $('#datatable').DataTable();

                $('#datatable tbody').on('dblclick', 'tr', function () {
                    let data = table.row(this).data();

                    let dataQr = `ID${data[0]};Назва:${data[1]};Інвентарний:${data[2]};Кількість:${data[5]};Ціна:${data[6]}`;

                    clearBox('qrcode');

                    new QRCode(document.getElementById('qrcode'), {
                        text: `${data[1]}`,
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
