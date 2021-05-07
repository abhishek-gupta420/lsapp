<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[PagesController::class,"index"]);


Route::get("/about",[PagesController::class,"about"]);

Route::get("/services",[PagesController::class,"services"]);

Route::get("/",[PagesController::class,"index"]);

Route::resource('posts',PostsController::class);

//route registering for destroy posts
//Route::put("/posts.destroy",[PostsController::class,"destroy"]);
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
