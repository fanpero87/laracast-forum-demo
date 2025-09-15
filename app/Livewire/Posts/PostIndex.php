<?php

namespace App\Livewire\Posts;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class PostIndex extends Component
{
    use WithPagination;

    #[Computed]
    public function posts()
    {
        return PostResource::collection(
            Post::with('user')->latest()->paginate(10)
        );
    }
}
