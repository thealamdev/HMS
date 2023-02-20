<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserManage\UserManageController;

Route::controller(UserManageController::class)->middleware('role_or_permission:super-admin|admin')->group(function(){
    Route::get('/','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{id}','edit')->name('edit');
    Route::put('update/{id}','update')->name('update');
    Route::delete('delete/{id}','destroy')->name('delete');
});