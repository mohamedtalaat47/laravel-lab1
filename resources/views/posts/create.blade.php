@extends('layout.app')
@section('title', 'posts')
@section('content')

    <h1 class="my-5">Add new post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Creator</label>
            <select class="form-control">
                <option>Ahmed</option>
                <option>Mohamed</option>
                <option>Ali</option>
            </select>
        </div>

        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
@endsection
