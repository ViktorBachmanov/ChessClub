<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\MainTableController;

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
/*
Route::get('/', function () {
    return view('chess');
});
*/
Route::get('/', [MainTableController::class, 'index']);
/*
Route::get('/new', function () {
    return view('newgame');
});
*/
Route::get('/new', [GameController::class, 'create']);

Route::post('/store', [GameController::class, 'store']);
