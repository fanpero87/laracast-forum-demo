<?php

use App\Livewire\Comments\CommentStore;
use App\Livewire\Comments\CommentUpdate;
use App\Livewire\Comments\CommentDelete;
use Livewire\Livewire;

it('Comment Store component renders successfully', function () {
    Livewire::test(CommentStore::class)
        ->assertStatus(200);
});

it('Comment Update component renders successfully', function () {
    Livewire::test(CommentUpdate::class)
        ->assertStatus(200);
});

it('Comment Delete component renders successfully', function () {
    Livewire::test(CommentDelete::class)
        ->assertStatus(200);
});
