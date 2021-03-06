@extends('layouts.app')

@section('content')
   <div class="jumbotron text-center">

    <h1>{{$title}}</h1>
    <p> Express your thoughts by writing your posts here</p>
    @guest
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>  
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
    </p>
    @endguest
   </div>
@endsection