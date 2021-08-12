@extends('layout')

@section('title')
    Materials
@endsection

@section('main_content')

{{--    <div class="container">--}}
{{--<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content bg-dark">--}}
            <div class="card shadow modal-body bg-dark rounded">
                <form action="" method="POST">
                    @csrf
{{--                    @method('PUT')--}}

                    <input type="hidden" name="id" value="{{$data["id"]}}">

                    <div class="p-2 mb-1 bg-dark rounded">
                        <div class="card-body p-2">

{{--                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">--}}
{{--                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                            </div>--}}

                            <h4 class="text-center card-title text-success">Edit Material <br> ({{$data["id"]}}.{{$data["title"]}})</h4>

                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" value="{{$data["title"]}}" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label for="inventory_number" class="form-label">Inventory Number</label>
                                            <input type="text" name="inventory_number" id="inventory_number" value="{{$data["inventory_number"]}}" class="form-control">
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="date_start" class="form-label">Date Start</label>

                                        <!-- Date Picker Input -->
                                            <input type="text" class="form-control" name="date_start" id="date_start" value="{{date("m-Y", strtotime($data["date_start"]))}}"/>
                                            <!-- DEnd ate Picker Input -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="row">

                                        <div class="col-sm-5">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" name="price" id="price" value="{{$data["price"]}}" class="form-control">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" name="amount" id="amount" value="{{$data["amount"]}}" class="form-control">
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="type" class="form-label">Type</label>
                                            <select name="type" id="type" aria-label="Type list">
                                                <option>{{$data["type"]}}</option>
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
                                        <div class="col-sm-12">
                                            <label for="employee_id" class="form-label">Employee</label>
                                            <select name="employee_id" id="employee_id" aria-label="Employee list" disabled>
                                                @foreach($employees->where('id', '=', $data["employee_id"]) as $employee)
                                                    <option>{{$employee->id}} {{$employee->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <label for="score_id" class="form-label">Score</label>
                                            <select name="score_id" id="score_id" aria-label="Employee list" disabled>
                                                @foreach($scores->where('id', '=', $data["score_id"]) as $score)
                                                    <option>{{$score->id}} {{$score->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg">Back</a>
{{--                                    <button type="button" class="">Close</button>--}}
                                </div>
                                <div class="d-grid gap-2 col-6">
                                    <button type="submit" class="btn btn-outline-success btn-lg">Update</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--    </div>--}}
    <script>
        $(document).ready(function () {
            $('select').selectize({
                // sortField: 'text'
            }); }
        );
    </script>
@endsection
