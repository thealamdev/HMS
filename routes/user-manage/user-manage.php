<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserManage\UserManageController;

Route::controller(UserManageController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{id}','edit')->name('edit');
    Route::put('update/{id}','update')->name('update');
});