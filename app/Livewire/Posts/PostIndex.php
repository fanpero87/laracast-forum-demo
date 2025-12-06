<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use Illuminate\Database\Eloquent\Builder;

#[Layout('components.layouts.guest')]
class PostIndex extends Component
{
    use WithPagination;

    public ?Topic $topic = null;

    #[Computed]
    public function posts()
    {
        $posts = Post::with(['user', 'topic'])
            ->when($this->topic, fn(Builder $query) => $query->whereBelongsTo($this->topic))
            ->latest('id')
            ->paginate(10);

        return PostResource::collection($posts);
    }

    #[Computed]
    public function topics()
    {
        return TopicResource::collection(Topic::all());
    }
}
