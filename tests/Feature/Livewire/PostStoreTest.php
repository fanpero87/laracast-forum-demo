<?php

use App\Livewire\Posts\PostStore;
use App\Models\Topic;
use App\Models\User;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('component renders successfully', function () {
    $user = User::factory()->create();
    $topic = Topic::factory()->create();
    
    $this->actingAs($user);
    
    Livewire::test(PostStore::class)
        ->assertStatus(200);
});
