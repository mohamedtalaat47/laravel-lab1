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
            <p class="card-text">{{ $post->user->name }} at {{ $post->publishedAt }}</p>
        </div>
    </div>

    <div class="container mt-5 border-left border-right">
        <div class="d-flex justify-content-center pt-3 pb-2">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <input type="text" placeholder="+ Add a comment" class="form-control addtxt" name="body">
            </form>
        </div>
        @if (!$post->comments->isEmpty())

            @foreach ($post->comments as $comment)
                <div class="d-flex justify-content-center align-items-center py-2">
                    <div class="d-flex justify-content-between second py-2 px-2"> <span
                            class="text1">{{ $comment->body }}</span>
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#commentModal">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="{{ route('comments.destroy', [$comment->id, $post->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Remove" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('comments.update',[$comment->id, $post->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="text" placeholder="enter new comment here" name="body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h1 class="text-center">No comments yet</h1>
        @endif
    </div>

    {{-- @livewire('comments', ['postID' => $post->id]) --}}



@endsection
