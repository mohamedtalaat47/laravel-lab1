<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = Post::paginate(10);
        return view('posts.index',['posts' => $allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = User::all();

        return view('posts.create',[
            'allUsers' => $allUsers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->all();

        // dd(request()->posted_by);
        Post::create([
            'title' => request()->title,
            'desc' => request()->desc,
            'user_id' => request()->posted_by,
        ]);

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
        // dd($requiredPost);
        return view('posts.show',['post' => $requiredPost]);
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
        return view('posts.edit',['post' => $requiredPost,'users' => $allUsers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->all();

        $requiredPost = Post::find($id);
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
}
