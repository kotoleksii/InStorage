@extends('layout')

@section('title')
    Home
@endsection

@section('main_content')

    <div class="py-5">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad cupiditate dolorem eos iusto qui quibusdam quos temporibus veniam? Alias amet blanditiis corporis enim et libero nulla porro provident quod veniam?</p>
    </div>


    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-warning bg-dark">
                <div class="card-header py-3 text-white bg-warning border-warning">
                    <h4 class="my-0 fw-normal">Materials</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{$materials_count}}<small class="text-muted fw-light">/mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Written of {{$materials_trashed}}</li>
                    </ul>
                    <a href="{{route('material')}}" class="w-100 btn btn-lg btn-warning" role="button">To go</a>
                </div>
            </div>
        </div>

    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-success bg-dark">
            <div class="card-header py-3 text-white bg-success border-success">
                <h4 class="my-0 fw-normal">Scores</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$scores_count}}<small class="text-muted fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                </ul>
                <a href="{{route('score')}}" class="w-100 btn btn-lg btn-success" role="button">To go</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-danger bg-dark">
            <div class="card-header py-3 text-white bg-danger border-danger">
                <h4 class="my-0 fw-normal">Employees</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">{{$employees_count}}<small class="text-muted fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                </ul>
                <a href="{{route('employee')}}" class="w-100 btn btn-lg btn-danger" role="button">To go</a>
            </div>
        </div>
    </div>
    </div>

@endsection
