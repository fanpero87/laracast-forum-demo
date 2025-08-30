<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use App\Http\Resources\PostResource;

#[Layout('components.layouts.guest')]
class PostShow extends Component
{

    public Post $post;

    #[Computed]
    public function post()
    {
        $this->post->load('user');
        return PostResource::make($this->post);
    }
}
