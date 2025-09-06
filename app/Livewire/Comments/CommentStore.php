<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CommentStore extends Component
{
    #[Validate('required|string|min:5|max:1000')]
    public $body;

    public $post;

    public function store()
    {
        $this->validate();

        Comment::create([
            'body' => $this->body,
            'user_id' => Auth::id(),
            'post_id' => $this->post->id,
        ]);

        $this->reset('body');
        
        // Dispatch an event to refresh comments on the parent component
        $this->dispatch('comment-added');
    }
}
