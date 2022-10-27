<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    
    public function index()
    {
        $allPosts = Post::with("user")->paginate(10);
        return view('posts.index', ['posts' => $allPosts]);
    }


    public function create()
    {
        $allUsers = User::all();

        return view('posts.create', [
            'allUsers' => $allUsers
        ]);
    }


    public function store(PostRequest $request)
    {
        $post = new Post();

        if ($request->file('image')) {
            $post->image = $request->file('image')->store('images');
        }
        $post->title = request()->title;
        $post->desc = request()->desc;
        $post->user_id = request()->posted_by;
        $post->save();

        return to_route('posts.index');
    }


    public function show($id)
    {
        $requiredPost = Post::with('comments')->find($id);
        return view('posts.show', ['post' => $requiredPost]);
    }

    public function showJSON($id)
    {
        $requiredPost = Post::find($id);
        return response()->json($requiredPost);
    }


    public function edit($id)
    {
        $allUsers = User::all();
        $requiredPost = Post::find($id);
        return view('posts.edit', ['post' => $requiredPost, 'users' => $allUsers]);
    }


    public function update(PostRequest $request, $id)
    {

        $requiredPost = Post::find($id);

        if ($request->hasFile('image')) {
            $path = $requiredPost->image;
            if ($requiredPost->image) {
                Storage::delete($path);
            }
            $requiredPost->image = $request->file('image')->store('images');
        }

        $requiredPost->title = request()->title;
        $requiredPost->desc = request()->desc;
        $requiredPost->user_id = request()->posted_by;
        $requiredPost->save();
        return to_route('posts.index');
    }


    public function destroy($id)
    {
        $requiredPost = Post::find($id);

        if ($requiredPost->image) {
            $path = $requiredPost->image;
            Storage::delete($path);
        }

        $requiredPost->delete();
        return to_route('posts.index');
    }


    public function restore()
    {
        Post::onlyTrashed()->restore();
        return to_route('posts.index');
    }

    // public function deleteOldPosts()
    // {
    //     return Queue::push(new PruneOldPostsJob());
    // }
}
