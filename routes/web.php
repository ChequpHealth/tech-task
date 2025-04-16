<?php

use App\Livewire\CreateUser;
use App\Livewire\UserList;
use App\Livewire\UpdateUser;
use Illuminate\Support\Facades\Route;

Route::get('/', CreateUser::class);
Route::get('/list', UserList::class);
Route::get('/users/{user}/edit', UpdateUser::class)->name('user.edit');
