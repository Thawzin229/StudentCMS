<?php

use App\Models\Job;
use App\Models\User;
use App\Models\Student;
use App\Models\Employer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAuthController;


Route::get('/home', function () {
    $user = User::where('is_admin',false)->count();
    $admin = User::where('is_admin',true)->count();
    $student = Student::count();
    return view('home',['user'=>$user,'admin'=>$admin,'student'=>$student]);
});
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


Route::group(['middleware' => 'authenticated','prefix'=>'user'],function(){
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