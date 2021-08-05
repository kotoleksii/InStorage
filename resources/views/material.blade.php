@extends('layout')

@section('title')
    Materials
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-success">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <form method="get" action="">

                    <div class="row">
                        <div class="col-md-7 mb-2">
                            <select class="form-select" name="employee_select" aria-label="Employee list">
                                <option selected>Select Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->id}} {{$employee->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-2">
                            <select class="form-select" name="score_select" aria-label="Employee list">
                                <option selected>Select Score</option>
                                @foreach($scores as $score)
                                    <option value="{{$score->id}}">{{$score->id}} {{$score->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-primary col-12">Find</button>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-block mt-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success btn-lg me-md-4 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-lg me-md-4 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger btn-lg me-md-4 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                        </button>

                        <button type="button" class="btn btn-info btn-lg me-md-4 col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Forward
                        </button>
                    </div>

                    <br>

                    <div class="col-xs-1 text-center">
                    <h1>Materials</h1>
                    @foreach($employees->where('id', '=', $_GET["employee_select"]??null) as $employee_title)
                        @foreach($scores->where('id', '=', $_GET["score_select"]??null) as $score_title)
                                <div class="alert alert-success">
                                    <h3>{{$employee_title->description}}</h3>
                                    <h5>({{$score_title->title}})</h5>
                                </div>
                        @endforeach
                    @endforeach
                    </div>

                    <table class="table table-striped table-dark table-bordered">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Inventory Number</th>
{{--                            <th scope="col">Options</th>--}}
                                <th scope="col">Date start</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sum</th>

{{--                                <th scope="col">Employee id</th>--}}
{{--                                <th scope="col">Score id</th>--}}
                            </tr>
                        </thead>
                        <tbody>

                        @if ($_GET["employee_select"]??null && $_GET["score_select"]??null)
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
                            <td>{{$material->price}}</td>
                            <td>{{$material->sum}}</td>

{{--                            <td>{{$material->employee_id}}</td>--}}
{{--                            <td>{{$material->score_id}}</td>--}}

                        <td>
                            <a class="btn btn-warning btn-sm" href="materials/edit/{{$material->id}}">Edit
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <a class="btn btn-danger btn-sm" href="materials/delete/{{$material->id}}">Delete
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>

{{--            <div class="col-md-3 mx-auto">--}}

                <!-- Modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="card shadow modal-body bg-dark rounded">
                                <form action="/materials/check" method="POST" class="needs-validation" novalidate="" autocomplete="off">
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
                                            <div class="mb-2">
                                                <label for="inventory_number" class="form-label">Inventory Number</label>
                                                <input type="text" name="inventory_number" id="inventory_number" class="form-control">
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-4 col-sm-5">
                                                            <label for="date_start" class="form-label">Date Start</label>
                                                            <input type="text" name="date_start" id="date_start" class="form-control">
                                                        </div>
                                                        <div class="col-4 col-sm-4">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="text" name="amount" id="amount" class="form-control">
                                                        </div>
{{--                                                        <div class="col-4 col-sm-3">--}}
{{--                                                            <label for="type" class="form-label">Type</label>--}}
{{--                                                            <input type="text" name="type" id="type" class="form-control">--}}
{{--                                                        </div>--}}
                                                        <div class="col-4 col-sm-3">
                                                            <label for="type" class="form-label">Type</label>
                                                            <select class="form-select" name="type" id="type" aria-label="Type list">
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
                                                <div class="col-sm-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-4 col-sm-6">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="text" name="price" id="price" class="form-control">
                                                        </div>
                                                        <div class="col-4 col-sm-6">
                                                            <label for="sum" class="form-label">Sum</label>
                                                            <input type="text" name="sum" id="sum" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 mb-4">
                                                    <div class="row">
                                                        <div class="col-4 col-sm-7">
                                                            <label for="employee_id" class="form-label">Employee</label>
{{--                                                            <input type="text" name="employee_id" id="employee_id" class="form-control">--}}

                                                            <select class="form-select" name="employee_id" id="employee_id" aria-label="Employee list">
                                                                <option selected>Select Employee</option>
                                                                @foreach($employees as $employee)
                                                                    <option value="{{$employee->id}}">{{$employee->id}} {{$employee->description}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-4 col-sm-5">
                                                            <label for="score_id" class="form-label">Score</label>
{{--                                                            <input type="text" name="score_id" id="score_id" class="form-control">--}}

                                                            <select class="form-select" name="score_id" id="score_id" aria-label="Employee list">
                                                                <option selected>Select Score</option>
                                                                @foreach($scores as $score)
                                                                    <option value="{{$score->id}}">{{$score->id}} {{$score->title}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 col-12">
{{--                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                                                <button type="submit" class="btn btn-outline-success btn-lg" name="btn_add">Create</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
    @endsection
