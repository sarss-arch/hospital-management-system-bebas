<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Hospital Management System API is running',
        'base_url' => url('/api/v1'),
        'postman_collection' => 'docs/HMS.postman_collection.json',
    ]);
});

Route::get('/login', function () {
    return response()->json([
        'status' => false,
        'message' => 'Unauthenticated. Please login first via /api/v1/auth/login.',
    ], 401);
})->name('login');