<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\homepage\CategoryController;
use App\Http\Controllers\Backend\homepage\HomePagesSectionController;
use App\Http\Controllers\Backend\homepage\homePageCommonSectionController;
use App\Http\Controllers\Backend\homepage\SettingController;

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


Route::prefix('app')->name('app.')->middleware('auth','permission')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //------------------Roles--------------------//
    Route::resource('roles', RoleController::class)->except('show');
    Route::post('roles', [RoleController::class,'getData'])->name('roles.get-data');

    //backend common title route
    
    Route::get('pagetitle/index', [homePageCommonSectionController::class, 'FormShow'])->name('pagtitle.form.show');
    Route::post('pagetitle/create', [homePageCommonSectionController::class, 'updateOrCreate'])->name('pagetitle.updateorCreated');


    //backend hero section route

    Route::get('home/hero/index', [HomePagesSectionController::class, 'HeroformShow'])->name('hero.form.show');
    Route::post('home/hero/create', [HomePagesSectionController::class, 'heroUpdateOrCreate'])->name('hero.updateOrCreated');

    //backend counter route
    
    Route::get('home/counter/index', [HomePagesSectionController::class, 'counterIndex'])->name('counter.index');
    Route::get('home/counter/create', [HomePagesSectionController::class, 'counterCreate'])->name('counter.create');
    Route::post('home/counter/store', [HomePagesSectionController::class, 'counterStore'])->name('counter.store');
    Route::get('home/counter/edit/{id}', [HomePagesSectionController::class, 'counterEdit'])->name('counter.edit');
    Route::patch('home/counter/update/{id}', [HomePagesSectionController::class, 'counterUpdate'])->name('counter.update');
    Route::delete('home/counter/delete/{id}', [HomePagesSectionController::class, 'counterDelete'])->name('counter.delete');

    //backend about pages route
    
    Route::get('home/about/index', [HomePagesSectionController::class, 'aboutformShow'])->name('about.form.show');
    Route::post('home/about/create', [HomePagesSectionController::class, 'aboutUpdateOrCreate'])->name('about.updateorCreated');

    //backend service pages route
    
    Route::get('home/service/index', [HomePagesSectionController::class, 'serviceIndex'])->name('service.index');
    Route::get('home/service/create', [HomePagesSectionController::class, 'serviceCreate'])->name('service.create');
    Route::post('home/service/store', [HomePagesSectionController::class, 'serviceStore'])->name('service.store');
    Route::get('home/service/edit/{id}', [HomePagesSectionController::class, 'serviceEdit'])->name('service.edit');
    Route::patch('home/service/update/{id}', [HomePagesSectionController::class, 'serviceUpdate'])->name('service.update');
    Route::delete('home/service/delete/{id}', [HomePagesSectionController::class, 'serviceDelete'])->name('service.delete');

    //backend choose pages route
    
    Route::get('home/choose/index', [HomePagesSectionController::class, 'chooseIndex'])->name('choose.index');
    Route::get('home/choose/create', [HomePagesSectionController::class, 'chooseCreate'])->name('choose.create');
    Route::post('home/choose/store', [HomePagesSectionController::class, 'chooseStore'])->name('choose.store');
    Route::get('home/choose/edit/{id}', [HomePagesSectionController::class, 'chooseEdit'])->name('choose.edit');
    Route::patch('home/choose/update/{id}', [HomePagesSectionController::class, 'chooseUpdate'])->name('choose.update');
    Route::delete('home/choose/delete/{id}', [HomePagesSectionController::class, 'chooseDelete'])->name('choose.delete');

    //backend testmonial pages route
    
    Route::get('home/testmonial/index', [HomePagesSectionController::class, 'testmonialIndex'])->name('testmonial.index');
    Route::get('home/testmonial/create', [HomePagesSectionController::class, 'testmonialCreate'])->name('testmonial.create');
    Route::post('home/testmonial/store', [HomePagesSectionController::class, 'testmonialStore'])->name('testmonial.store');
    Route::get('home/testmonial/edit/{id}', [HomePagesSectionController::class, 'testmonialEdit'])->name('testmonial.edit');
    Route::patch('home/testmonial/update/{id}', [HomePagesSectionController::class, 'testmonialUpdate'])->name('testmonial.update');
    Route::delete('home/testmonial/delete/{id}', [HomePagesSectionController::class, 'testmonialDelete'])->name('testmonial.delete');

    //backend portfolio pages route
    
    Route::get('home/portfolio/index', [HomePagesSectionController::class, 'portfolioIndex'])->name('portfolio.index');
    Route::get('home/portfolio/create', [HomePagesSectionController::class, 'portfolioCreate'])->name('portfolio.create');
    Route::post('home/portfolio/store', [HomePagesSectionController::class, 'portfolioStore'])->name('portfolio.store');
    Route::get('home/portfolio/edit/{id}', [HomePagesSectionController::class, 'portfolioEdit'])->name('portfolio.edit');
    Route::patch('home/portfolio/update/{id}', [HomePagesSectionController::class, 'portfolioUpdate'])->name('portfolio.update');
    Route::delete('home/portfolio/delete/{id}', [HomePagesSectionController::class, 'portfolioDelete'])->name('portfolio.delete');

    //backend category pages route
    
    Route::get('/blogcategory/index', [CategoryController::class, 'blogCategoryIndex'])->name('blog.category.index');
    Route::get('/blogcategory/create', [CategoryController::class, 'blogCategoryCreate'])->name('blog.category.create');
    Route::post('/blogcategory/store', [CategoryController::class, 'blogCategoryStore'])->name('blog.category.store');
    Route::get('/blogcategory/edit/{id}', [CategoryController::class, 'blogCategoryEdit'])->name('blog.category.edit');
    Route::patch('/blogcategory/update/{id}', [CategoryController::class, 'blogCategoryUpdate'])->name('blog.category.update');
    Route::delete('/blogcategory/delete/{id}', [CategoryController::class, 'blogCategoryDelete'])->name('blog.category.delete');

    //backend blogs pages route
    
    Route::get('home/blog/index', [HomePagesSectionController::class, 'blogIndex'])->name('blog.index');
    Route::get('home/blog/create', [HomePagesSectionController::class, 'blogCreate'])->name('blog.create');
    Route::post('home/blog/store', [HomePagesSectionController::class, 'blogStore'])->name('blog.store');
    Route::get('home/blog/edit/{id}', [HomePagesSectionController::class, 'blogEdit'])->name('blog.edit');
    Route::patch('home/blog/update/{id}', [HomePagesSectionController::class, 'blogUpdate'])->name('blog.update');
    Route::delete('home/blog/delete/{id}', [HomePagesSectionController::class, 'blogDelete'])->name('blog.delete');

    //backend hireme pages route
    
    Route::get('home/hireme/index', [HomePagesSectionController::class, 'hiremeformShow'])->name('hireme.form.show');
    Route::post('home/hireme/create', [HomePagesSectionController::class, 'hiremeUpdateOrCreate'])->name('hireme.updateorCreated');

    //backend hireme pages route
    
    Route::get('settings/contact/index', [HomePagesSectionController::class, 'contactIndex'])->name('contact.index.show');
    Route::post('settings/contact/create', [HomePagesSectionController::class, 'contactCreate'])->name('contact.Created');
    Route::delete('settings/contact/delete/{id}', [HomePagesSectionController::class, 'contactDelete'])->name('contact.delete');

    //backend hireme pages route
    
    Route::get('settings/mapaddress/index', [HomePagesSectionController::class, 'mapaddressformShow'])->name('mapaddress.form.show');
    Route::post('settings/mapaddress/create', [HomePagesSectionController::class, 'mapaddressUpdateOrCreate'])->name('mapaddress.updateorCreated');

    //backend setting route
    
    Route::get('settings/general/create',[SettingController::class,'settingCreate'])->name('setting.create');
    Route::post('settings/general/store',[SettingController::class,'settingUpdateOrCreate'])->name('setting.updateOrcreate');

});

