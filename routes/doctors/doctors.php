<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Doctors\DoctorsController;

Route::controller(DoctorsController::class)->group(function(){
    Route::get('/','registration')->name('registration');
});