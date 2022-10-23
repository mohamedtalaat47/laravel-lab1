@extends('layout.app')
@section('title', 'posts')
@section('content')

    <h1 class="my-5">Add new post</h1>
    <form method="POST" action="{{ route('posts.update',$post['id']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post['title']}}" name="title">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post['desc']}}" name="desc">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Creator</label>
            <select class="form-control" name="posted_by">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-outline-success">Update</button>
    </form>
@endsection
