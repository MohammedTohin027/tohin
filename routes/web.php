<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');

Auth::routes();

//  Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('admin')->group(function(){
    //  Main
    Route::get('/main', [MainController::class, 'index'])->name('main.index');
    Route::post('/main', [MainController::class, 'update'])->name('main.update');

    //  Service
    Route::prefix('service')->group(function () {
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/create', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/list', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('/active/{id}', [ServiceController::class, 'active'])->name('service.active');
        Route::get('/inactive/{id}', [ServiceController::class, 'inactive'])->name('service.inactive');
        Route::get('/destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    });
    //  Portfolio
    Route::prefix('portfolio')->group(function () {
        Route::get('/create', [PortfolioController::class, 'create'])->name('portfolio.create');
        Route::post('/create', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::get('/list', [PortfolioController::class, 'index'])->name('portfolio.index');
        Route::get('/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
        Route::post('/update/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
        Route::get('/active/{id}', [PortfolioController::class, 'active'])->name('portfolio.active');
        Route::get('/inactive/{id}', [PortfolioController::class, 'inactive'])->name('portfolio.inactive');
        Route::get('/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    });
    //  About
    Route::prefix('about')->group(function () {
        Route::get('/create', [AboutController::class, 'create'])->name('about.create');
        Route::post('/create', [AboutController::class, 'store'])->name('about.store');
        Route::get('/list', [AboutController::class, 'index'])->name('about.index');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::post('/update/{id}', [AboutController::class, 'update'])->name('about.update');
        Route::get('/active/{id}', [AboutController::class, 'active'])->name('about.active');
        Route::get('/inactive/{id}', [AboutController::class, 'inactive'])->name('about.inactive');
        Route::get('/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy');
    });

});