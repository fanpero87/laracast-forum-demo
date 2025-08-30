<?php

use App\Livewire\CommentIndex;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CommentIndex::class)
        ->assertStatus(200);
});
