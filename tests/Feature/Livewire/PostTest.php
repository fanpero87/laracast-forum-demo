<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Post;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('renders successfully', function () {
    Livewire::test(Post::class)
        ->assertStatus(200);
});

test('component exists on the page', function() {
    $this->get('/posts')
            ->assertSeeLivewire(Post::class);
});
