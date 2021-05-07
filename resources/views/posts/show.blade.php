@extends('layouts.app')


@section('content')

<a href="/posts" class="btn btn-default">Go Back</a>
<h1> {{$post->title}}</h1>
@if($post->cover_image != 'noimage.jpg')

<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}"><br><br>

@else 
<img style="width:50px height:50px" src="/storage/cover_images/{{$post->cover_image}}"><br><br>
@endif

{{-- 
<small> Written on {{$post->created_at}}</small> --}}

<div>
    {{$post->body}}
</div>
  <hr>
  <small> Written on {{$post->created_at}} by {{$post->user->name}}</small>
  <hr>
  @if(!Auth::guest())

    @if(Auth::user()->id == $post->user_id)
      <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>

      <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="pull-right">
        @csrf
        {{method_field('DELETE')}}
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
      </form>
      @endif 
  @endif
@endsection