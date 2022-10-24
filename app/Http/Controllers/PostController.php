<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = Post::with("user")->paginate(10);
        return view('posts.index', ['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = User::all();

        return view('posts.create', [
            'allUsers' => $allUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        if ($request->file('image')) {
            $post->image = $request->file('image')->store('public/images');
        }
        $post->title = request()->title;
        $post->desc = request()->desc;
        $post->user_id = request()->posted_by;
        $post->save();

        return redirect('/posts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allUsers = User::all();
        $requiredPost = Post::find($id);
        return view('posts.edit', ['post' => $requiredPost, 'users' => $allUsers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        request()->all();

        $requiredPost = Post::find($id);
        if ($request->file('image')) {
            $requiredPost->image = $request->file('image')->store('public/images');
        }
        $requiredPost->title = request()->title;
        $requiredPost->desc = request()->desc;
        $requiredPost->user_id = request()->posted_by;
        $requiredPost->save();
        return redirect('/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requiredPost = Post::find($id);
        $requiredPost->delete();
        return redirect('/posts/');
    }

    public function restore()
    {
        Post::onlyTrashed()->restore();
        return redirect('/posts/');
    }

    // public function deleteOldPosts()
    // {
    //     return Queue::push(new PruneOldPostsJob());
    // }
}
