<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api-docs', function() {
    return view('api-docs');
});
Route::get('/docs/api-docs.json', function() {
    $path = public_path('docs/api-docs.json');
    if (file_exists($path)) {
        return response()->file($path, ['Content-Type' => 'application/json']);
    }
    return response()->json(['error' => 'Documentation not found'], 404);
});