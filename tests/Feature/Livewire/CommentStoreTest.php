<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\Comments\CommentStore;
use App\Livewire\Comments\CommentUpdate;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('component renders successfully', function () {
    Livewire::test(CommentStore::class)
        ->assertStatus(200);
});

// test('cant update another users post', function () {
//     $user = User::factory()->create();
//     $stranger = User::factory()->create();

//     $post = Post::factory()->for($stranger)->create();

//     Livewire::actingAs($user)
//         ->test(CommentUpdate::class, ['post' => $post])
//         ->set('title', 'Living the lavender life')
//         ->call('save')
//         ->assertUnauthorized();

//     Livewire::actingAs($user)
//         ->test(CommentUpdate::class, ['post' => $post])
//         ->set('title', 'Living the lavender life')
//         ->call('save')
//         ->assertForbidden();
// });
