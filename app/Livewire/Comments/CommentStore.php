<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CommentStore extends Component
{
    #[Validate('required|string|min:5|max:1000')]
    public $body;

    public $post;

    public $commentBeingEdited;

    public function store()
    {
        $this->validate();

        if ($this->commentBeingEdited) {
            $comment = Comment::findOrFail($this->commentBeingEdited);

            $this->authorize('update', $comment);

            $comment->update([
                'body' => $this->body,
            ]);

            $this->dispatch('comment-updated');
        } else {
            Comment::create([
                'body' => $this->body,
                'user_id' => Auth::id(),
                'post_id' => $this->post->id,
            ]);

            $this->dispatch('comment-added');
        }

        $this->reset(['body', 'commentBeingEdited']);
    }

    #[On('edit-comment')]
    public function editComment($comment)
    {
        $this->commentBeingEdited = $comment['id'];
        $this->body = $comment['body'];
    }

    public function cancelEdit()
    {
        $this->reset(['body', 'commentBeingEdited']);
        $this->resetValidation();
    }
}
