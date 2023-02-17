<?php

use App\Http\Controllers\Backend\PatiendManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



// Backend Routes:
Route::get('patient', [PatiendManagementController::class, 'index'])->name('patient');


// all dashboard or backend routes:
Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth'])->group(function () {
        Route::prefix('role-permission')->name('role-pemission.')->group(function () {
            require __DIR__ . '/role-permission/role-permission.php';
        });
    });

    Route::middleware(['auth'])->group(function () {
        Route::prefix('role-assign')->name('role-assign.')->group(function () {
            require __DIR__ . '/role-assign/role-assign.php';
        });
    });

    Route::middleware(['auth'])->group(function () {
        Route::prefix('user-manage')->name('user-manage.')->group(function () {
            require __DIR__ . '/user-manage/user-manage.php';
        });
    });
});
