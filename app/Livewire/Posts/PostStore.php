<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class PostStore extends Component
{
    #[Validate('required|string|min:5|max:100')]
    public $title = '';

    #[Validate('required|string|min:5|max:1000')]
    public $body = '';


    public function store()
    {
        $this->authorize('create', Post::class);

        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id(),
        ]);

        $this->dispatch('post-added');
        $this->reset(['title', 'body']);

        return redirect()->route('posts.show', $post);
    }
}
