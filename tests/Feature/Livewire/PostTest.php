<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Posts\PostIndex;
use App\Livewire\Posts\PostShow;
use App\Livewire\Posts\PostStore;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);


it('Post Index component renders successfully', function () {
    Livewire::test(PostIndex::class)
        ->assertStatus(200);
});

it('Post Show component renders successfully', function () {
    Livewire::test(PostShow::class)
        ->assertStatus(200);
});

it('Post Store component renders successfully', function () {
    Livewire::test(PostStore::class)
        ->assertStatus(200);
});

it('Post Index component exists on the page', function () {
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
