<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',[TestController::class,'index'])->name('test-users');


//
//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('/login', [AuthController::class, 'login']);
//    Route::post('/register', [AuthController::class, 'register']);
//    Route::post('/logout', [AuthController::class, 'logout']);
//    Route::post('/refresh', [AuthController::class, 'refresh']);
//    Route::get('/user-profile', [AuthController::class, 'userProfile']);
//});
Route::get('/show/{id}',[TestController::class,'show'])->name('test-users-show');
Route::get('/categories',[TestController::class,'categories'])->name('categories');
Route::get('/categories/show/{id}',[TestController::class,'categories_show'])->name('categories.show');
Route::middleware(['auth.web.or.api'])->group(function () {


    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);

});
