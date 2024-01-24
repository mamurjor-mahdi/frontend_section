<?php

use App\Http\Controllers\Backend\homepage\HomePagesSectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Frontend\HomePageController;

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


Route::prefix('portal')->name('portal.')->middleware(['auth', 'is_client', 'is_verify'])->group(function(){
    Route::get('/dashboard', [ClientDashboardController::class, 'dashboard'])->name('dashboard');
});


