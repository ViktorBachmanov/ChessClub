<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\MainTableController;
use App\Http\Controllers\MyPasswordResetLinkController;
use App\Http\Controllers\MyNewPasswordController;

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

Route::get('/', [MainTableController::class, 'index'])->name('table');
Route::post('/', [MainTableController::class, 'index']);


Route::get('/new', [GameController::class, 'create'])->middleware('auth');

Route::get('/del', [GameController::class, 'delete'])->middleware('auth');
Route::post('/destroy', [GameController::class, 'destroy'])->middleware('auth');

Route::post('/store', [GameController::class, 'store'])->middleware('auth');


Route::get('/forgot-password', [MyPasswordResetLinkController::class, 'create']);
                //->middleware(['guest:'.config('fortify.guard')])
                //->name('password.request');
				
Route::post('/forgot-password', [MyPasswordResetLinkController::class, 'store']);
            //->middleware(['guest:'.config('fortify.guard')])
            //->name('password.email');
			
Route::get('/reset-password/{token}', [MyNewPasswordController::class, 'create']);
                //->middleware(['guest:'.config('fortify.guard')])
                //->name('password.reset');
				
Route::post('/reset-password', [MyNewPasswordController::class, 'store']);
            //->middleware(['guest:'.config('fortify.guard')])
            //->name('password.update');
			
Route::get('/login', function() {
	return view('auth.login');
})->name('login');


Route::get('/desc', [MainTableController::class, 'desc']);
Route::post('/desc', [MainTableController::class, 'desc']);


Route::get('/games', [GamesController::class, 'index']);

