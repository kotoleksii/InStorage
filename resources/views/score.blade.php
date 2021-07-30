@extends('layout')

@section('title')
    Score
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

    <br>
    <h1>All Scores</h1>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-striped table-dark table-bordered">
                    <thead>
                        <tr>
                            <th scope="row">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scores as $score)
                    <tr>
                        <th scope="row">{{$score->id}}</th>
                        <td>{{$score->title}}</td>
                        <td>{{$score->description}}</td>

                        <td>
                            <a class="btn btn-warning btn-sm" href="scores/edit/{{$score->id}}">Edit
                                <i class="bi bi-pencil-fill"></i>
                            </a>

                            <a class="btn btn-danger btn-sm" href="scores/delete/{{$score->id}}">Delete
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3 mx-auto">
                <form action="/scores/check" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                   @csrf
                    <div class="card shadow p-1 mb-5 bg-dark rounded">
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
{{--                    </form>--}}
            </div>
        </div>
    </div>
@endsection
