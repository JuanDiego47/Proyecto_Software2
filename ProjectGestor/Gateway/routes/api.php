<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return response()->json(['message' => 'Bienvenido, Admin']);
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/send-notification', function (Request $request) {
    $response = Http::post(env('NOTIFICATIONS_SERVICE_URL') . '/send-notification', [
        'phone' => $request->input('phone'),
        'message' => $request->input('message'),
    ]);

    return response()->json($response->json(), $response->status());
});

<<<<<<< HEAD
//CRISTIAN RUTAS 
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/projects', function (Request $request) {
        $response = Http::get(env('CRISTIAN_SERVICE_URL') . '/projects');
        return response()->json($response->json(), $response->status());
    });

    Route::get('/projects/{id}', function ($id) {
        $response = Http::get(env('CRISTIAN_SERVICE_URL') . "/projects/{$id}");
        return response()->json($response->json(), $response->status());
    });

    Route::post('/projects', function (Request $request) {
        $response = Http::post(env('CRISTIAN_SERVICE_URL') . '/projects', $request->all());
        return response()->json($response->json(), $response->status());
    });
});
=======
Route::post('/predict', function (Request $request) {
    $flask_url = env('FLASK_URL') . '/predict';
    $response = Http::post($flask_url, $request->all());
    return $response->json();
});
>>>>>>> 47daa0a1727d76536bb8fda7ea784e23107f7c38
