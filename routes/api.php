<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('api')->get('/current_user', function (Request $request) {
    return response()->json([
        'user_data' => [
            'id' => $request->user()->id,
            'google_id' => $request->user()->google_id,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'phone' => $request->user()->phone,
            'status' => $request->user()->status,
            'role' => $request->user()->role,
            'google_token' => $request->user()->google_token,
        ]
    ]);
})->name('user');

Route::group(['middleware' => ['api'], 'prefix' => 'auth'], function ($router) {
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/is-admin', [AuthController::class, 'Check']);
});

#members
Route::get("/members",[StudentController::class,"members"])->middleware('auth_api');
Route::get("/members/{id}",[StudentController::class,"member"])->middleware('auth_api');

# redirect routes for already logined user
Route::group(['middleware' => ['api', 'authenticated'], 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
});