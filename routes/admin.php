<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\homepage\HomePagesSectionController;

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


Route::prefix('admin')->name('admin.')->middleware('auth','permission')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

});

//backend home pages controller
Route::prefix('portal')->name('form.')->group(function(){
    Route::get('/form/show', [HomePagesSectionController::class, 'formShow'])->name('show');
    Route::post('/form/create', [HomePagesSectionController::class, 'updateOrCreate'])->name('updateorCreated');
});

