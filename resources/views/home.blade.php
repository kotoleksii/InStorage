@extends('layout')

{{--@section('title')--}}
{{--    Home--}}
{{--@endsection--}}

@section('main_content')

    <div class="py-5 text-center">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cupiditate dolorem eos iusto qui quibusdam quos temporibus veniam? Alias amet blanditiis corporis enim et libero nulla porro provident quod veniam?</p>
    </div>

    <!-- Start Blue Spinner -->
    <div class="d-flex justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
    <!-- End Blue Spinner -->

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow" style="background-color: #1d2636">
{{--                <div class="card-header py-3 text-white bg-warning border-warning">--}}
                <div class="card-header py-3 text-white" style="background-color: #1776d4">
                <h4 class="my-0 fw-normal">Materials</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$materials_count}}<small class="text-muted fw-light"> units</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li>{{$materials_trashed}} items are disposed of</li>
                    </ul>
{{--                    <a href="{{route('material')}}" class="w-100 btn btn-lg btn-warning" style="background-color: #1526ba" role="button">To go</a>--}}
                    <a href="{{route('material')}}" class="w-100 btn btn-lg text-white" style="background-color: #1776d4" role="button">To go</a>
                </div>
            </div>
        </div>

    <div class="col">
{{--        <div class="card mb-4 rounded-3 shadow-sm border-success bg-dark">--}}
        <div class="card mb-4 rounded-3 shadow" style="background-color: #1d2636">
        {{--            <div class="card-header py-3 text-white bg-success border-success">--}}
            <div class="card-header py-3 text-white" style="background-color: #508fcd">
            <h4 class="my-0 fw-normal">Scores</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$scores_count}}<small class="text-muted fw-light"> invoices</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li>{{$hot_score_title}} - {{$hot_score_items}} items</li>
                </ul>
{{--                <a href="{{route('score')}}" class="w-100 btn btn-lg btn-success" role="button">To go</a>--}}
                <a href="{{route('score')}}" class="w-100 btn btn-lg text-white" style="background-color: #508fcd" role="button">To go</a>
            </div>
        </div>
    </div>

    <div class="col">
{{--        <div class="card mb-4 rounded-3 shadow-sm border-danger bg-dark">--}}
        <div class="card mb-4 rounded-3 shadow" style="background-color: #1d2636">
        {{--            <div class="card-header py-3 text-white bg-danger border-danger">--}}
            <div class="card-header py-3 text-white" style="background-color: #84a6c7">
            <h4 class="my-0 fw-normal">Employees</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$employees_count}}<small class="text-muted fw-light"> people</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li>{{$employee_last_month_count}} new over the last month</li>
                </ul>
                <a href="{{route('employee')}}" class="w-100 btn btn-lg text-white" style="background-color: #84a6c7" role="button">To go</a>
                {{--                <a href="{{route('employee')}}" class="w-100 btn btn-lg btn-danger" role="button">To go</a>--}}
            </div>
        </div>
    </div>
    </div>

@endsection
