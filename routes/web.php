<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\PostLikesController;
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


Route::get('/test', function () {
    $mo = User::find(2);
    return $mo->friends->pluck('id');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[PostController::class,'index'])
    ->name('dashboard');

Route::post('post/store',[PostController::class,'store'])->name('post.store');

Route::get('profiles/{user:name}',[ProfilesController::class,'show'])
    ->name('profile.show');

Route::post('profiles/{user:name}/add-friend',[ProfilesController::class,'addFriend'])
    ->name('user.add.friend');
Route::get('profiles/{user:name}/unfriend',[ProfilesController::class,'deleteFriend'])
    ->name('user.delete.friend');

Route::get('profiles/{user:name}/edit',[ProfilesController::class,'edit'])
    ->name('profile.edit')->middleware('can:edit,user');

Route::patch('profiles/{user:name}/update',[ProfilesController::class,'update'])
    ->name('profile.update');

Route::get('explore',[ExploreController::class,'index'])
    ->name('explore')->middleware('auth');

Route::post('posts/{post:id}/like',[PostLikesController::class,'like'])
    ->name('post.like');
Route::delete('posts/{post:id}/dislike',[PostLikesController::class,'dislike'])
    ->name('post.dislike');
