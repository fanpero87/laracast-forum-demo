<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentUpdate extends Component
{

    public Comment $comment;


    public function update()
    {
        // Dispatch event to load the comment into edit mode
        $this->dispatch('edit-comment', comment: $this->comment);
    }
}
