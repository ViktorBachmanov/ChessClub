<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
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
/*
Route::get('/', function () {
    return view('chess');
});
*/
Route::get('/', [MainTableController::class, 'index'])->name('table');
/*
Route::get('/new', function () {
    return view('newgame');
});
*/
Route::get('/new', [GameController::class, 'create'])->middleware('auth');

Route::get('/del', [GameController::class, 'delete'])->middleware('auth.basic');
Route::post('/destroy', [GameController::class, 'destroy'])->middleware('auth.basic');

Route::post('/store', [GameController::class, 'store'])->middleware('auth.basic');


Route::post('/forgot-password', [MyPasswordResetLinkController::class, 'store']);
            //->middleware(['guest:'.config('fortify.guard')]);
            //->name('password.email');
Route::get('/reset-password/{token}', [MyNewPasswordController::class, 'create']);
                //->middleware(['guest:'.config('fortify.guard')])
                //->name('password.reset');
				
Route::post('/reset-password', [MyNewPasswordController::class, 'store']);
            //->middleware(['guest:'.config('fortify.guard')])
            //->name('password.update');
/*			
Route::get('/sent', function() {
	return view('auth.sent-link', ['status' => true,
									'email' => 'info@chess']);
});*/


