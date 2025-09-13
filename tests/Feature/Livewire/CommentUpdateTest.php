<?php

use Livewire\Livewire;
use App\Livewire\Comments\CommentUpdate;

test('component renders successfully', function () {
    Livewire::test(CommentUpdate::class)
        ->assertStatus(200);
});
