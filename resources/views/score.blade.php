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
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-md-3 mx-auto">
                <form action="/scores/check" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                    @csrf
                    <div class="card shadow p-2 mb-5 bg-dark rounded">
                        <div class="card-body p-2">
                            <h4 class="text-center card-title text-success">New Score</h4>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control">
                            </div>

                            <div class="col text-center">
                                <button type="submit" class="btn btn-success" name="btn_add">Create a new score</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    @endsection
