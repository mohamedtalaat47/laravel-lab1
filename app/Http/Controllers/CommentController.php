<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $post = Post::find($id);
        $comment = new Comment;
        $comment->body = request()->body;
        $post->comments()->save($comment);
        return redirect('/posts/'.$id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $postID)
    {
        $comment = Comment::find($id);
        $comment->body = request()->body;
        $comment->save();
        return redirect('/posts/'.$postID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $postID)
    {
        Comment::find($id)->delete();
        return redirect('/posts/'.$postID);
    }
}
