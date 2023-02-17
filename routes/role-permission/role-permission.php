<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolePermission\RolePermissionController;

Route::controller(RolePermissionController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');

    // Role and Permission:
    Route::post('role-permission/store','RolePermission')->name('role.permission.store');
    
});