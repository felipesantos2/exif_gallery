<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(1);

Route::view('/', 'welcome');
Route::livewire('/users', 'pages::users.index');
Route::livewire('/media', 'pages::media-gallery.index');
