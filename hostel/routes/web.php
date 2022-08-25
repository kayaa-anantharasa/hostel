<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\OrderController;
use  App\Http\Controllers\ChangePasswordController;
Route::resources(['products' =>ProductController::class,
'users' =>UserController::class,
'orders'=>OrderController::class]);

Route::get('/', function () {
    return view('index');
});

Route::get('/logout',[UserController::class,'logout']);
Route::get('/createwarden',[UserController::class,'createwarden']);
Route::get('/createstudent',[UserController::class,'createstudent']);
Route::get('/studentsindex',[UserController::class,'stuindex']);

Route::post('/checklogin',[UserController::class,'checklogin']);


Route::get('change-password', [ChangePasswordController::class,'index'])->name('changes.index');

Route::post('change-password', [ChangePasswordController::class,'store'])->name('change.password');
