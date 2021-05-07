@extends('layouts.app')


@section('content')

<h1> Create Post</h1>
<div class="container">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
       
        @csrf
        <div  class="form-group">
            <label for="title">Title </label>
            <input type="text" placeholder="Enter Title of your post" class="form-control" id="title" name='title'>
        </div>
        <div  class="form-group">
            <label for="body">Post 
                
            </label>
            <textarea class="form-control" id='body' rows="5" name="body"></textarea>
        </div>
        {{--UPloading files--}}
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