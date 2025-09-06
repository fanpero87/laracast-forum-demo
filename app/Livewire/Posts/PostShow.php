<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use App\Http\Resources\PostResource;
use App\Http\Resources\CommentResource;

#[Layout('components.layouts.guest')]
class PostShow extends Component
{
    use WithPagination;

    public Post $post;

    #[Computed]
    public function post()
    {
        return PostResource::make($this->post->with('user'));
    }

    #[Computed]
    public function comments()
    {
        return CommentResource::collection(
            $this->post->comments()
                ->with('user')
                ->latest()
                ->paginate(2)
        );
    }
    
    #[On('comment-added')]
    public function refreshComments()
    {
        // This will trigger a re-render of the comments
        unset($this->comments);
    }
}
