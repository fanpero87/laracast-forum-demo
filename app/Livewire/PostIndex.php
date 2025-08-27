<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class PostIndex extends Component
{
    public function render(){
        $posts = Post::with(['user', 'comments.user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.post-index', ['posts'=> $posts]);
    }
}
