<?php

use App\Livewire\Comment;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Comment::class)
        ->assertStatus(200);
});
