<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\dashbordController;
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

Route::get('/', [dashbordController::class,'showData']);
Route::group(['middleware'=>['auth']],function(){

	Route::get('/dashboard', [dashbordController::class,'show'])->name('dashboard');
	Route::get('/post',[postController::class,'index'])->name('post_index');
	Route::post('/post',[postController::class,'create'])->name('post_create');
	Route::get('/edit/{id}',[postController::class,'edit'])->name('post_edit');
	Route::put('/edit/{id}',[postController::class,'update'])->name('post_update');
	Route::get('/delete/{id}',[postController::class,'destroy'])->name('post_destroy');

});

require __DIR__.'/auth.php';
