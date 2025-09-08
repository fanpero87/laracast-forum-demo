<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentUpdate extends Component
{

    public Comment $comment;


    public function update()
    {

        $this->authorize('update', $this->comment);

        $this->comment->update();

        // Dispatch an event to refresh comments on the parent component
        $this->dispatch('comment-updated');
    }
}
