@extends('layout.app_admin')

@section('content')
    <div class="col-12">
        <h1 class="p-3 text-center my-3">Add Post</h1>
    </div>
    <div class="col-8 mx-auto">
        <form action="{{ route('posts.admin.store') }}" method="post" class="form border p-3">
            @csrf
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
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="mb-3">
                <label for="">Post Description</label>
                <textarea name="description" class="form-control" cols="30" rows="7">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Save">
            </div>
        </form>
    </div>
@endsection
