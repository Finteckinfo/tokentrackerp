<?php
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // Ensure this matches the Vue entry point view (e.g., app.blade.php)
})->where('any', '.*');