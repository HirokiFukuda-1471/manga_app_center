<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicsController;  //外部にあるComicrsControllerクラスをインポート。

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

Route::get('/', [ComicsController::class, 'index']); 
Route::post('/comics', [ComicsController::class, 'store']);
Route::get('/comics/create', [ComicsController::class, 'create']);
Route::get('/comics/{comic}', [ComicsController::class ,'show']);
Route::put('/comics/{comic}', [ComicsController::class, 'update']);
Route::get('/comics/{comic}/edit', [ComicsController::class, 'edit']);
Route::delete('/comics/{comic}', [ComicsController::class,'delete']);
