<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentDelete extends Component
{

    public Comment $comment;

    public function delete()
    {

        $this->authorize('delete', $this->comment);

        $this->comment->delete();

        // Dispatch an event to refresh comments on the parent component
        $this->dispatch('comment-deleted');
    }
}
