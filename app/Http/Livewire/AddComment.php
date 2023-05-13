<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Notifications\NewComment;

class AddComment extends Component
{
    public $body;
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function addComment()
    {
        $validatedComment = $this->validate([
            'body' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment;
        $comment->body = $validatedComment['body'];
        $comment->post_id = $this->post->id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $this->post->user->notify(new NewComment($comment));

        $this->body = '';
    }
}

