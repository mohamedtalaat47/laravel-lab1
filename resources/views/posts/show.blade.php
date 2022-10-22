@extends('layout.app')
@section('title', 'post')
@section('content')
    <div class="card my-5">
        <div class="card-body">
            <h5 class="card-title">{{$post['title']}}</h5>
            <p class="card-text">{{$post['desc']}}</p>
        </div>
    </div>
    <div class="card my-5">
        <div class="card-body">
            <h5 class="card-title">Posted by</h5>
            <p class="card-text">{{$post['posted_by']}} at {{$post['creation_date']}}</p>
        </div>
    </div>
@endsection