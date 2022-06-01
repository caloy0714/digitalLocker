<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LockerController;

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
    return view('login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lockers', [LockerController::class, 'index']);
Route::get('/history', [LockerController::class, 'history']);
Route::get('/edit-locker/{id}', [LockerController::class, 'showEditForm']);
Route::post('/save-edit-locker', [LockerController::class, 'saveLockerChanges']);
Route::get('/new-locker-form', [LockerController::class, 'showNewForm']);
Route::post('/save-new-locker', [LockerController::class, 'saveNewLocker']);
Route::get('/delete-locker/{id}', [LockerController::class, 'deleteLocker']);
Route::get('/show-locker/{id}', [LockerController::class, 'showLocker']);


