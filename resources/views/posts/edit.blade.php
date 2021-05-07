@extends('layouts.app')


@section('content')

<h1> Edit Post</h1>
<div class="container">
    <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
       
        @csrf
        {{method_field('PUT')}}
        <div  class="form-group">
            <label for="title">Title </label>
            <input type="text" placeholder="Enter Title of your post" class="form-control" id="title" name='title' value="{{$post->title}}">
        </div>
        <div  class="form-group">
            <label for="body">Post </label>
            <textarea class="form-control"id="body" rows="5" name="body">{{$post->body}}</textarea>
        </div>
        <div  class="form-group">
            <label for="body">Choose an Image to Upload</label>
            <input type="file" name="cover_image">
        </div>
        <div  class="form-group">
            
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection