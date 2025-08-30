<?php

namespace Tests\Feature\Livewire;

use App\Http\Resources\PostResource;
use App\Livewire\PostIndex;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('renders successfully', function () {
    Livewire::test(PostIndex::class)
        ->assertStatus(200);
});

test('component exists on the page', function () {
    $this->get('/posts')
        ->assertSeeLivewire(PostIndex::class);
});

// test('passes posts to the view', function () {
//     \App\Models\Post::factory(3)->create();

//     Livewire::test(PostIndex::class)
//         ->assertViewHas('posts', function ($posts) {
//             return $posts->count() === 3;
//         });
// });
