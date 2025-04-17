<?php

use App\Livewire\UserList;
use App\Livewire\UserView;
use App\Livewire\CreateUser;
use App\Livewire\UpdateUser;
use Illuminate\Support\Facades\Route;

Route::get('/new', CreateUser::class)->name('users.create');
Route::get('/', UserList::class)->name('users.index');
Route::get('/users/{user}/edit', UpdateUser::class)->name('user.edit');
// Single User View Route
Route::get('/users/{userId}', UserView::class)->name('user.view');
