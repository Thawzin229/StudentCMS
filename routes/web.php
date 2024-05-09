<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAuthController;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');});
Route::middleware(['middleware' => 'user'])->group(function () {

    Route::group(['prefix'=>'user'],function(){
        Route::get('/students',[StudentController::class,'get']);
        Route::get('/students/{id}',[StudentController::class,'show']);
        Route::get('/password-update',[StudentController::class,'password']);
        Route::patch('/password-update',[StudentController::class,'updatePass']);
    });
    Route::group(['prefix'=>'user','middleware' => 'roll_access'],function(){
        Route::get('students/create/page',[StudentController::class,'createPage']);
        Route::post('/students/create',[StudentController::class,'createStudent']);
        Route::get('/students/{id}/edit',[StudentController::class,'editPage']);
        Route::delete('/students/{id}',[StudentController::class,'delete']);
        Route::patch('/students/{id}',[StudentController::class,'update']);
    });
});


Route::group(['middleware' => 'guest','prefix'=>'user'],function(){
    Route::get('register',[UserAuthController::class,"page"])->name('register');
    Route::post('register',[UserAuthController::class,"register"]);
    Route::get('/login',[UserAuthController::class,"loginpage"]);
    Route::post('login',[UserAuthController::class,"login"]);
});
Route::post('auth/logout',function(){
    Auth::guard('web')->logout();
    return redirect('/user/login');
});

Route::redirect('/','user/login');