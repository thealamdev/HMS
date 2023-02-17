<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleAssign\RoleAssignController;

Route::controller(RoleAssignController::class)->middleware('role_or_permission:super-admin')->group(function(){
    Route::get('/','index')->name('index');
    
});