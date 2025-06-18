<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Facades\PaymentGateaway;
use \App\Http\Middleware\GuestRequestMiddleware;
class Service
{
    public function __construct()
    {
        echo 'init';
    }

    public function test()
    {
        echo 'test';
    }
}

Route::get('/', function () {
    return view('welcome');
});

// Laravel automatically created the Service instance and sends it through so we can call stuff on it
Route::get('/test', function (Service $service) {
    dd($service::class);
});


Route::get('/request', function (Request $request) {
    PaymentGateaway::charge(100);

    // Global function that u dont need to access with a fascade inside helpers.php function
    // the other way u can access it is Response:json([test]);
    return response()->json([
        'test'
    ]);
});
Route::get('/payment', [\App\Http\Controllers\Payment::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Only guest can access this routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);
});

// Only auth users can access this
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('inventory', InventoryController::class)->middleware('auth');
});
