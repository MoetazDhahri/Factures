<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactureController; // <-- Import the CORRECT controller name

/* ... other routes ... */

// This single line creates all 7 CRUD routes for /factures
Route::resource('factures', FactureController::class);

// Keep other routes like the home page if needed
Route::get('/', function () {
    return view('welcome');
});

// Remove or comment out old routes for TestConroller
// Route::get('/test-message', [TestConroller::class, 'showMessage']);