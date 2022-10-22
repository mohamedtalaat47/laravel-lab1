@extends('layout.app')
@section('title', 'post')
@section('content')
    <div class="d-flex justify-content-between my-5">
        <h1>Post</h1>
        <a href="{{ route('posts.index') }}"><button class="btn btn-outline-success">All posts</button></a>
    </div>
    <div class="card my-5">
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <p class="card-text">{{ $post['desc'] }}</p>
        </div>
    </div>
    <div class="card my-5">
        <div class="card-body">
            <h5 class="card-title">Posted by</h5>
            <p class="card-text">{{ $post['posted_by'] }} at {{ $post['creation_date'] }}</p>
        </div>
    </div>
@endsection
