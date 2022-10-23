@extends('layout.app')
@section('title', 'posts')
@section('content')
    <div class="d-flex justify-content-between my-5">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}"><button class="btn btn-outline-success">add post</button></a>
    </div>
    @if (!$posts->isEmpty())
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Descreption</th>
                    <th scope="col">posted by</th>
                    <th scope="col">creation date</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td class="w-25">{{ Str::limit($post['title'], 20) }}</td>
                        <td class="w-25">{{ Str::limit($post['desc'], 35) }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->toDateString() }}</td>
                        <td>
                            <x-button color="success" content="view" href="{{ route('posts.show', $post['id']) }}">
                            </x-button>
                            <x-button color="primary" content="update" href="{{ route('posts.edit', $post['id']) }}">
                            </x-button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Delete</button>
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
                        <form action="{{ route('posts.destroy', $post['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    @else
        <div class="text-center my-5">
            <h1>No posts yet</h1>
        </div>
    @endif

@endsection
