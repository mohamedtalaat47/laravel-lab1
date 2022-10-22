@extends('layout.app')
@section('title', 'posts')
@section('content')
    <div class="d-flex justify-content-between my-5">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}"><button class="btn btn-outline-success">add post</button></a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">posted by</th>
                <th scope="col">creation date</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post['id'] }}</th>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['posted_by'] }}</td>
                    <td>{{ $post['creation_date'] }}</td>
                    <td>
                        <x-button color="success" content="view" href="{{ route('posts.show', $post['id']) }}"></x-button>
                        <x-button color="primary" content="update" href="{{ route('posts.edit', $post['id']) }}"></x-button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                        {{-- <x-button color="danger" content="delete" attr='data-bs-toggle="modal" data-bs-target="#exampleModal"'></x-button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('posts.destroy', $post['id']) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection