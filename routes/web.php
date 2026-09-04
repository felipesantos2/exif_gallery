<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::livewire('/users', 'pages::users.index');
