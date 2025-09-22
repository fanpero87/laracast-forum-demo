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

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    #[Computed(cache: true)]
    public function post()
    {
        return PostResource::make($this->post->load('user', 'topic'));
    }

    #[Computed]
    public function comments()
    {
        return CommentResource::collection(
            $this->post->comments()
                ->with('user')
                ->latest()
                ->paginate(20)
        );
    }

    #[On('comment-added')]
    #[On('comment-updated')]
    #[On('comment-deleted')]
    public function refreshComments()
    {
        // This will trigger a re-render of the comments
        unset($this->comments);
    }
}
