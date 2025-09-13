<?php

use App\Livewire\Comments\CommentDelete;
use Livewire\Livewire;


test('component renders successfully', function () {
    Livewire::test(CommentDelete::class)
        ->assertStatus(200);
});
