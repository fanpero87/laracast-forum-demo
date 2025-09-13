<?php

use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Posts\PostIndex;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);


test('component renders successfully', function () {
    Livewire::test(PostIndex::class)
        ->assertStatus(200);
});


test('component exists on the page', function () {
    $this->get('/posts')
        ->assertSeeLivewire(PostIndex::class);
});

test('component passes posts to the view', function () {
    Post::factory(3)->create();

    Livewire::test(PostIndex::class)
        ->assertSet('posts', function ($posts) {
            return $posts->count() === 3;
        });
});
