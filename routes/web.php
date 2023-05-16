<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\TagController;
use App\Models\PostMedia;
use App\Models\Tag;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['prefix' => 'category'],function(){
    Route::get('/',[CategoryController::class,'list']);
    Route::post('store',[CategoryController::class,'store']);
    Route::get('delete/{id}',[CategoryController::class,'delete']);
    Route::get('update/{id}',[CategoryController::class,'update']);
    Route::post('edit/{id}',[CategoryController::class,'edit']);
    Route::post('active',[CategoryController::class,'active']);
});
Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[AdminController::class,'list']);
    Route::get('update/{id}',[AdminController::class,'update']);
    Route::post('edit/{id}',[AdminController::class,'edit']);
    Route::post('active',[AdminController::class,'active']);
});
Route::group(['prefix' => 'tag'],function(){
    Route::get('/',[TagController::class,'list']);
    Route::post('store',[TagController::class,'store']);
    Route::get('delete/{id}',[TagController::class,'delete']);
    Route::get('update/{id}',[TagController::class,'update']);
    Route::post('edit/{id}',[TagController::class,'edit']);
    Route::post('active',[TagController::class,'active']);

});
Route::group(['prefix' => 'comment'],function(){
    Route::get('/',[CommentController::class,'list']);
    Route::get('delete/{id}',[CommentController::class,'delete']);
    Route::post('store',[CommentController::class,'store']);
});
Route::group(['prefix' => 'post'],function(){
    Route::get('/',[PostController::class,'list']);
    Route::get('create',[PostController::class,'create']);
    Route::post('store',[PostController::class,'store']);
    Route::get('delete/{id}',[PostController::class,'delete']);
    Route::get('update/{id}',[PostController::class,'update']);
    Route::post('edit/{id}',[PostController::class,'edit']);
    Route::get('views/{id}',[PostController::class,'views']);
    Route::get('search',[PostController::class,'search']);
    Route::post('active',[PostController::class,'active']);

});
Route::group(['prefix' => 'media'],function() {
    Route::get('/',[MediaController::class,'list']);
    Route::get('delete/{id}',[MediaController::class,'delete']);
});



Route::get('dashboard', [PostController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
