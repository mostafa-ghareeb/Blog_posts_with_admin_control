@extends('layout.app_admin')

@section('content')
<div class="col-12">
    <h1 class="p-3 border text-center my-3">All Posts</h1>
</div>
@foreach ($posts as $post)
<div class="col-12">
    <div class="card">
        <div class="card-header">
            {{$post->user->name}} - {{ $post->created_at->format('Y-m-d') }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <a href="{{route('Posts.admin.show',$post->id)}}" class="btn btn-primary">Show Post</a>
        </div>
    </div>
</div>
@endforeach
@endsection
