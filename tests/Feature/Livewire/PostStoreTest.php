<?php

use App\Livewire\Posts\PostStore;
use Livewire\Livewire;


test('component renders successfully', function () {
    Livewire::test(PostStore::class)
        ->assertStatus(200);
});
