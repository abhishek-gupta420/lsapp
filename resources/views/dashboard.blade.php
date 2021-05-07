@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Dashboard') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts)>0)
                        <table class="table table-stripped">
                            <tr>
                                <th> Title </th>
                                <th></th>
                                <th></th>
                            </tr>
                            

                        @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="pull-right">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else 
                        <p><h5>You have no Posts !!</h5></p>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
