<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\homepage\CategoryController;
use App\Http\Controllers\Backend\homepage\homePageCommonTitleController;
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


//backend common title route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('pagetitle/formshow', [homePageCommonTitleController::class, 'FormShow'])->name('pagtitle.form.show');
    Route::post('pagetitle/create', [homePageCommonTitleController::class, 'updateOrCreate'])->name('pagetitle.updateorCreated');
});

//backend home pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('hero/formshow', [HomePagesSectionController::class, 'HeroformShow'])->name('hero.form.show');
    Route::post('/hero/create', [HomePagesSectionController::class, 'heroUpdateOrCreate'])->name('hero.updateOrCreated');
});
//backend home pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/counter/index', [HomePagesSectionController::class, 'counterIndex'])->name('counter.index');
    Route::get('/counter/create', [HomePagesSectionController::class, 'counterCreate'])->name('counter.create');
    Route::post('/counter/store', [HomePagesSectionController::class, 'counterStore'])->name('counter.store');
    Route::get('/counter/edit/{id}', [HomePagesSectionController::class, 'counterEdit'])->name('counter.edit');
    Route::patch('/counter/update/{id}', [HomePagesSectionController::class, 'counterUpdate'])->name('counter.update');
    Route::delete('/counter/delete/{id}', [HomePagesSectionController::class, 'counterDelete'])->name('counter.delete');
});
//backend about pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('about/formshow', [HomePagesSectionController::class, 'aboutformShow'])->name('about.form.show');
    Route::post('/about/create', [HomePagesSectionController::class, 'aboutUpdateOrCreate'])->name('about.updateorCreated');
});
//backend service pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/service/index', [HomePagesSectionController::class, 'serviceIndex'])->name('service.index');
    Route::get('/service/create', [HomePagesSectionController::class, 'serviceCreate'])->name('service.create');
    Route::post('/service/store', [HomePagesSectionController::class, 'serviceStore'])->name('service.store');
    Route::get('/service/edit/{id}', [HomePagesSectionController::class, 'serviceEdit'])->name('service.edit');
    Route::patch('/service/update/{id}', [HomePagesSectionController::class, 'serviceUpdate'])->name('service.update');
    Route::delete('/service/delete/{id}', [HomePagesSectionController::class, 'serviceDelete'])->name('service.delete');
});
//backend choose pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/choose/index', [HomePagesSectionController::class, 'chooseIndex'])->name('choose.index');
    Route::get('/choose/create', [HomePagesSectionController::class, 'chooseCreate'])->name('choose.create');
    Route::post('/choose/store', [HomePagesSectionController::class, 'chooseStore'])->name('choose.store');
    Route::get('/choose/edit/{id}', [HomePagesSectionController::class, 'chooseEdit'])->name('choose.edit');
    Route::patch('/choose/update/{id}', [HomePagesSectionController::class, 'chooseUpdate'])->name('choose.update');
    Route::delete('/choose/delete/{id}', [HomePagesSectionController::class, 'chooseDelete'])->name('choose.delete');
});
//backend testmonial pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/testmonial/index', [HomePagesSectionController::class, 'testmonialIndex'])->name('testmonial.index');
    Route::get('/testmonial/create', [HomePagesSectionController::class, 'testmonialCreate'])->name('testmonial.create');
    Route::post('/testmonial/store', [HomePagesSectionController::class, 'testmonialStore'])->name('testmonial.store');
    Route::get('/testmonial/edit/{id}', [HomePagesSectionController::class, 'testmonialEdit'])->name('testmonial.edit');
    Route::patch('/testmonial/update/{id}', [HomePagesSectionController::class, 'testmonialUpdate'])->name('testmonial.update');
    Route::delete('/testmonial/delete/{id}', [HomePagesSectionController::class, 'testmonialDelete'])->name('testmonial.delete');
});
//backend portfolio pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/portfolio/index', [HomePagesSectionController::class, 'portfolioIndex'])->name('portfolio.index');
    Route::get('/portfolio/create', [HomePagesSectionController::class, 'portfolioCreate'])->name('portfolio.create');
    Route::post('/portfolio/store', [HomePagesSectionController::class, 'portfolioStore'])->name('portfolio.store');
    Route::get('/portfolio/edit/{id}', [HomePagesSectionController::class, 'portfolioEdit'])->name('portfolio.edit');
    Route::patch('/portfolio/update/{id}', [HomePagesSectionController::class, 'portfolioUpdate'])->name('portfolio.update');
    Route::delete('/portfolio/delete/{id}', [HomePagesSectionController::class, 'portfolioDelete'])->name('portfolio.delete');
});
//backend portfolio pages route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/blog_category/index', [CategoryController::class, 'blogCategoryIndex'])->name('blog.category.index');
    Route::get('/blog_category/create', [CategoryController::class, 'blog_categoryCreate'])->name('blog.category.create');
    Route::post('/blog_category/store', [CategoryController::class, 'blog_categoryStore'])->name('blog.category.store');
    Route::get('/blog_category/edit/{id}', [CategoryController::class, 'blog_categoryEdit'])->name('blog.category.edit');
    Route::patch('/blog_category/update/{id}', [CategoryController::class, 'blog_categoryUpdate'])->name('blog.category.update');
    Route::delete('/blog_category/delete/{id}', [CategoryController::class, 'blog_categoryDelete'])->name('blog.category.delete');
});
