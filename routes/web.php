<?php

use App\Livewire\Posts\PostShow;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;

use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('posts', PostIndex::class)->name('posts.index');
Route::get('posts/{post}', PostShow::class)->name('posts.show');



require __DIR__ . '/auth.php';
