<?php

use Illuminate\Support\Facades\Route;
use parsaco\authtestpackage\Http\Controllers\LoginController;
use parsaco\authtestpackage\Http\Controllers\RegisterController;

Route::name('user.')->middleware(['web','guestCheck'])->group(function (){
    Route::get('register',[RegisterController::class,'create'])->name('createRegister');
    Route::post('register/store',[RegisterController::class,'store'])->name('storeRegister');

    Route::get('login',[LoginController::class,'create'])->name('createLogin');
    Route::post('login/store',[LoginController::class,'store'])->name('storeLogin');


});

Route::middleware('web')->get('logout',function (){
    if(auth()->check()){
        auth()->logout();
    }
    return redirect('/');
});
