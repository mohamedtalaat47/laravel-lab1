<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;

class Comments extends Component
{

    public $postID;
    public Comment $comments;

    protected $rules = [
        'comments.body' => 'required|string|min:3',
    ];
    
    public function render()
    {
        $id = $this->postID;
        return view('livewire.comments', [
            'comments' => Post::find($id)->comments
        ]);
    }

    public function mount()
    {
        $this->comments = new Comment();
    }

    public function save()
    {
        $post = Post::find($this->postID);
        $comment = new Comment;
        $comment->body = $this->comments->body;
        $post->comments()->save($comment);
    }
}
