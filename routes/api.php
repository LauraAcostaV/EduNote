<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RandomUserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/students', function () {
//     return 'Student List';
// });

Route::get('/random-users', [RandomUserController::class, 'getRandomUsers']);