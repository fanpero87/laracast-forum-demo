<?php

use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Comment;
use App\Livewire\Posts\PostShow;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);


test('component renders successfully', function () {
    Livewire::test(PostShow::class)
        ->assertStatus(200);
});


test('displays post title and content', function () {
    $user = User::factory()->create();

    $post = Post::factory()
        ->recycle($user)
        ->create([
            'title' => 'Test Post Title',
            'body' => 'This is the post content'
        ]);

    Livewire::test(PostShow::class, ['post' => $post])
        ->assertSee('Test Post Title')
        ->assertSee('This is the post content')
        ->assertSee($user->name);
});

test('displays post comments', function () {
    $user = User::factory()->create();
    $commenter = User::factory()->create();

    $post = Post::factory()
        ->recycle($user)
        ->create();

    $comment = Comment::factory()
        ->recycle($commenter)
        ->create([
            'post_id' => $post->id,
            'body' => 'This is a test comment'
        ]);

    Livewire::test(PostShow::class, ['post' => $post])
        ->assertSee('This is a test comment')
        ->assertSee($commenter->name);
});

test('authenticated users can see comment form', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $this->actingAs($user);

    Livewire::test(PostShow::class, ['post' => $post])
        ->assertSeeLivewire('comments.comment-store');
});

test('guests cannot see comment form', function () {
    $post = Post::factory()->create();

    Livewire::test(PostShow::class, ['post' => $post])
        ->assertDontSeeLivewire('comments.comment-store');
});

// test('refreshes comments when comment events are fired', function () {
//     $post = Post::factory()->create();

//     Livewire::test(PostShow::class, ['post' => $post])
//         ->dispatch('comment-added')
//         ->assertDispatched('comment-added');
// });
