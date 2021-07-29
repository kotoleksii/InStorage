@extends('layout')

@section('title')
    Review
@endsection

@section('main_content')
    <h1>Add your review</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Enter Review" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Enter Message"></textarea><br>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection
