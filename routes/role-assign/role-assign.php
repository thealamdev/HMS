<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleAssign\RoleAssignController;

Route::controller(RoleAssignController::class)->group(function(){
    Route::get('/','index')->name('index');
    
});