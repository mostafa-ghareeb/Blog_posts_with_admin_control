@extends('layout.app_admin')

@section('content')
<div class="col-12">
    <h1 class="p-3 text-center my-3">Edit Post</h1>
</div>
<div class="col-8 mx-auto">
    <form action="{{route('posts.admin.update',$post->id)}}" method="post" class="form border p-3">
        @csrf
        @method('PUT')
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="mb-3">
            <label for="">Post Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="">Post Description</label>
            <textarea name="description" class="form-control" cols="30" rows="7">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="">Writer</label>
            <select name="user_id" class="form-control" >
                <option value="1">mostafa</option>
                <option value="2">ahmad</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" class="form-control bg-success" value="Save">
        </div>
    </form>
</div>
@endsection