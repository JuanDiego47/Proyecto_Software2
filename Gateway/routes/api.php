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

Route::post('/send-email', function (Request $request) {
    $response = Http::post(env('EMAIL_SERVICE_URL') . '/api/send-email', [
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ]);

    return response()->json($response->json(), $response->status());
});

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

Route::get('/home', function () {
    return redirect(env('CRISTIAN_SERVICE_URL'));
});

Route::post('/predict', function (Request $request) {
    $flask_url = env('FLASK_URL') . '/predict';
    $response = Http::post($flask_url, $request->all());
    return $response->json();
});


