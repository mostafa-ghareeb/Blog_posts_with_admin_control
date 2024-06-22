@extends('layout.app_admin')

@section('content')
<div class="col-12">
    <a href="{{route('posts.admin.create')}}" class="btn btn-primary my-3">Add New post</a>
    <h1 class="p-3 border text-center my-3">All Posts</h1>
</div>
<div class="col-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Descripthion</td>
                <td>Writer</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->user->name}}</td>
                <td>
                    <a href="{{route('posts.admin.edit',$post->id)}}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{route('posts.admin.delete',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection