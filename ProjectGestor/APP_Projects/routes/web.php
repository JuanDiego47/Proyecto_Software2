<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/users/login', function () {
    return view('users.login');
});

Route::get('/users/register', [UserController::class,'create']);
Route::post('/users/register', [UserController::class,'store']);

Route::post('/users/login', [SessionController::class,'store']);
Route::get('/users/logout', [SessionController::class,'destroy']);




Route::get('/projects/create', [ProjectController::class,'create']);
Route::get('/projects', [ProjectController::class,'index']);
Route::get('/projects/{id}', [ProjectController::class,'show']);
Route::post('/projects', [ProjectController::class,'store']);
Route::get('/projects/edit/{id}', [ProjectController::class,'edit']);
Route::patch('/projects', [ProjectController::class,'update']);
Route::delete('/projects/{id}', [ProjectController::class,'destroy']);
Route::get('/projects/prediction/{id}', [ProjectController::class, 'prediction']);