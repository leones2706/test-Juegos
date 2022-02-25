<?php

use App\Http\Controllers\PostController;
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

Route::get('/',[PostController::class,'index']);

Route::get('/create',function(){
    return view('create');
});

Route::post('/post',[PostController::class,'store']);
Route::get('/delete/{id}',[PostController::class,'destroy']);
Route::get('/edit/{id}',[PostController::class,'edit']);
Route::get('/update/{id}',[PostController::class,'update']);
Route::get('/status/update', [PostController::class, 'updateStatus'])->name('update.status');



