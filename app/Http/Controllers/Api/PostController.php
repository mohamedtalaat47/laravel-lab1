<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = PostResource::collection(Post::with('user')->paginate(15));

        return response()->json([
            'status' => 'success',
            'posts' => $posts
        ]);
    }

    public function store(PostRequest $request)
    {
        $user = auth('sanctum')->user();
        $post = Post::create([
            'title' => request()->title,
            'desc' => request()->desc,
            'user_id' => $user['id']
        ]);

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return $requiredPost = new PostResource($post);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Post Updated successfully!",
            'post' => $post
        ], 200);
    }

    public function destroy(Post $post)
    {
        //
    }
}
