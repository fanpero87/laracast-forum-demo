<?php

namespace App\Livewire\Comments;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CommentStore extends Component
{
    #[Validate('required|string|min:5|max:1000')]
    public $body = '';

    public Post $post;

    public ?int $commentBeingEdited = null;

    public bool $showIndicator = false;

    public string $message = '';


    public function store(): void
    {
        $this->validate();

        if ($this->commentBeingEdited) {
            $this->updateComment();
        } else {
            $this->createComment();
        }

        $this->showIndicator = true;
        $this->reset(['body', 'commentBeingEdited']);
    }

    private function createComment(): void
    {
        Comment::create([
            'body' => $this->body,
            'html' => $this->body,
            'user_id' => Auth::id(),
            'post_id' => $this->post->id,
        ]);

        $this->message = 'Comment added successfully!';
        $this->dispatch('comment-added');
    }

    private function updateComment(): void
    {
        $comment = Comment::findOrFail($this->commentBeingEdited);

        $this->authorize('update', $comment);

        $comment->update([
            'body' => $this->body,
        ]);

        $this->message = 'Comment updated successfully!';
        $this->dispatch('comment-updated');
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
