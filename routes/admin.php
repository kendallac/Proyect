<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('categories',CategoryController::class)->names('admin.categories');
 
Route::resource('tag', TagController::class)->names('admin.tags');

Route::resource('post', PostController::class)->names('admin.posts');
Route::resource('user', UserController::class)->only('index','edit','update')->names('admin.users');