<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Topic;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class PostStore extends Component
{
    #[Validate('required|string|min:5|max:100')]
    public $title = '';

    #[Validate('required|string|min:5|max:1000')]
    public $body = '';

    #[Validate('required|exists:topics,id')]
    public $topic_id = '';

    #[Computed]
    public function topics()
    {
        return Topic::all();
    }

    public function store()
    {
        $this->authorize('create', Post::class);

        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'html' => $this->body,
            'topic_id' => $this->topic_id,
            'user_id' => Auth::id(),
        ]);

        $this->dispatch('post-added');
        $this->reset(['title', 'body']);

        return redirect()->route('posts.show', [$post->id, Str::slug($post->title)]);
    }
}
