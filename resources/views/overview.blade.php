@extends('layout')

@section('title')
    Overview
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

    {{--    <div class="container">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-8">--}}


            <div class="col-xs-1 text-center">
                <h1>Materials</h1>
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
{{--                    <th scope="col">Options</th>--}}
                    <th scope="col">Employee</th>
                    <th scope="col">Score</th>

                </tr>
                </thead>
                <tbody>

                @foreach($materials as $material)
                    <tr>
                        <th scope="row">{{$material->id}}</th>
                        <td>{{$material->title}}</td>
                        <td>{{$material->inventory_number}}</td>
                        <td>{{$material->date_start}}</td>
                        <td>{{$material->type}}</td>
                        <td>{{$material->amount}}</td>
                        <td>{{$material->price}}</td>
                        <td>{{$material->total_sum_hr}}</td>

                        @foreach($employees->where('id', '=', $material->employee_id) as $employee)
                        <td>{{$employee->description}}</td>
                        @endforeach

                        @foreach($scores->where('id', '=', $material->score_id) as $score)
                            <td>{{$score->title}}</td>
                        @endforeach

                    </tr>
                @endforeach
                </tbody>
            </table>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    "scrollX": true,
                    "order": [[ 0, "desc" ]],
                } );
            } );
        </script>

@endsection
