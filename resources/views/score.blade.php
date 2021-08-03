@extends('layout')

@section('title')
    Materials
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <form method="get" action="">

                    <select class="form-select" name="employee_select">
                        <option selected>Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->id}} {{$employee->description}}</option>
                        @endforeach
                    </select>

                    <br>

                    <select class="form-select" name="score_select">
                        <option selected>Select Score</option>
                        @foreach($scores as $score)
                            <option value="{{$score->id}}">{{$score->id}} {{$score->title}}</option>
                        @endforeach
                    </select>

                    <br>

                    <button type="submit" class="btn btn-success">Find</button>

                    <br>
                    <br>
                    <br>
                    <h1>Materials</h1>
                    <table class="table table-striped table-dark table-bordered">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Inventory Number</th>
{{--                            <th scope="col">Options</th>--}}
                                <th scope="col">Employee id</th>
                                <th scope="col">Score id</th>
                            </tr>
                        </thead>
                        <tbody>

                        @if ($_GET["employee_select"] && $_GET["score_select"] !== null)
                        @foreach($materials
                                    -> where('employee_id', '=', $_GET["employee_select"])
                                    -> where('score_id', '=', $_GET["score_select"]) as $material)
                            <tr>
                            <th scope="row">{{$material->id}}</th>
                            <td>{{$material->title}}</td>
                            <td>{{$material->inventory_number}}</td>
                            <td>{{$material->employee_id}}</td>
                            <td>{{$material->score_id}}</td>

{{--                        <td>--}}
{{--                            <a class="btn btn-warning btn-sm" href="scores/edit/{{$score->id}}">Edit--}}
{{--                                <i class="bi bi-pencil-fill"></i>--}}
{{--                            </a>--}}

{{--                            <a class="btn btn-danger btn-sm" href="scores/delete/{{$score->id}}">Delete--}}
{{--                                <i class="bi bi-trash-fill"></i>--}}
{{--                            </a>--}}
{{--                        </td>--}}
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>



            <div class="col-md-3 mx-auto">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a new Material
                </button>
                <!-- Button trigger modal -->

                <!-- Modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
{{--                            <div class="modal-header">--}}
{{--                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                            </div>--}}
                            <div class="card shadow modal-body bg-dark rounded">
                                <form action="/scores/check" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                    @csrf
                                    <div class="p-2 mb-5 bg-dark rounded">
                                        <div class="card-body p-2">
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
                                                        <div class="col-4 col-sm-3">
                                                            <label for="type" class="form-label">Type</label>
                                                            <input type="text" name="type" id="type" class="form-control">
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
                                                        <div class="col-4 col-sm-8">
                                                            <label for="employee_id" class="form-label">Employee</label>
                                                            <input type="text" name="employee_id" id="employee_id" class="form-control">
                                                        </div>
                                                        <div class="col-4 col-sm-4">
                                                            <label for="score_id" class="form-label">Score</label>
                                                            <input type="text" name="score_id" id="score_id" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

{{--                                            <div class="mb-2">--}}
{{--                                                <label for="employee_id" class="form-label">Employee</label>--}}
{{--                                                <input type="text" name="employee_id" id="employee_id" class="form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-2">--}}
{{--                                                <label for="score_id" class="form-label">Score</label>--}}
{{--                                                <input type="text" name="score_id" id="score_id" class="form-control">--}}
{{--                                            </div>--}}

{{--                                                        <div class="col text-center">--}}
{{--                                                <button type="submit" class="btn btn-success" name="btn_add">Create a new material</button>--}}

                                            <div class=" ms-auto">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" name="btn_add">Create</button>
                                            </div>


                                            </div>
                                        </div>
                                    </div>
                                </form>

{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                <button type="submit" class="btn btn-success" name="btn_add">Create a new Material</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <!-- Modal -->


                <form action="/scores/check" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                    @csrf
                    <div class="card shadow p-2 mb-5 bg-dark rounded">
                        <div class="card-body p-2">
                            <h4 class="text-center card-title text-success">New Material</h4>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="inventory_number" class="form-label">Description</label>
                                <input type="text" name="inventory_number" id="inventory_number" class="form-control">
                            </div>

                            <div class="col text-center">
                                <button type="submit" class="btn btn-success" name="btn_add">Create a new material</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    @endsection
