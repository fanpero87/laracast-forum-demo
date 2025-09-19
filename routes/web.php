<?php

use App\Http\Resources\PostResource;
use App\Livewire\Posts\PostShow;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Posts\PostStore;

use App\Livewire\Comments\CommentStore;
use App\Livewire\Comments\CommentDelete;

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('posts/{post}/comments', CommentStore::class)->name('posts.comments.store');
    Route::delete('posts/{post}/comments/{comment}', CommentDelete::class)->name('posts.comments.delete');

    Route::get('posts/create', PostStore::class)->name('posts.store');
});

Route::get('posts/{topic?}', PostIndex::class)->name('posts.index');

Route::get('posts/{post}/{slug?}', PostShow::class)->name('posts.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
