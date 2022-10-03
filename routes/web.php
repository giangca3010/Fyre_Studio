<?php

use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


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

use App\Http\Controllers\Admin\ClientMenuController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\CategoryPortfolioController;
use App\Http\Controllers\Admin\OurClientController;


Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [\App\Http\Controllers\Client\AboutUsController::class, 'index'])->name('about-us');
    Route::get('/portfolio', [\App\Http\Controllers\Client\PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/portfolio/{slug}', [\App\Http\Controllers\Client\PortfolioController::class, 'detail'])->name('portfolio.detail');
    Route::get('/blog', [\App\Http\Controllers\Client\BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{slug}', [\App\Http\Controllers\Client\BlogController::class, 'detail'])->name('blog.detail');
    Route::get('/contact', [\App\Http\Controllers\Client\ContactController::class, 'index'])->name('contact');
});

Route::prefix('/admin')->group(function () {

    Route::get('/login', 'Admin\LoginController@login')->name('login');
    Route::post('/login', 'Admin\LoginController@postLogin');
    Route::get('/logout', 'Admin\LoginController@logout');

    Route::namespace('Admin')->middleware('adminLoginCheck')->group(function () {

        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);

        Route::prefix('client-menus')->group(function () {
            Route::get('', [ClientMenuController::class, 'index'])->name('menu.index');
            Route::get('create', [ClientMenuController::class, 'create'])->name('menu.create');
            Route::post('store', [ClientMenuController::class, 'store'])->name('menu.store');
            Route::get('{id}/edit', [ClientMenuController::class, 'edit'])->name('menu.edit');
            Route::post('{id}/update', [ClientMenuController::class, 'update'])->name('menu.update');
            Route::post('{id}/delete', [ClientMenuController::class, 'delete'])->name('menu.delete');
        });

        Route::prefix('banners')->group(function () {
            Route::get('', [BannerController::class, 'index'])->name('banner.index');
            Route::get('create', [BannerController::class, 'create'])->name('banner.create');
            Route::post('store', [BannerController::class, 'store'])->name('banner.store');
            Route::get('{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
            Route::post('{id}/update', [BannerController::class, 'update'])->name('banner.update');
            Route::POST('{id}/delete', [BannerController::class, 'delete'])->name('banner.delete');
        });

        Route::prefix('about-us')->group(function () {
            Route::get('', [AboutUsController::class, 'index'])->name('aboutUs.index');
            Route::post('update', [AboutUsController::class, 'update'])->name('aboutUs.update');
        });

        Route::prefix('contact')->group(function () {
            Route::get('', [ContactController::class, 'index'])->name('contact.index');
            Route::post('update', [ContactController::class, 'update'])->name('contact.update');
        });

        Route::prefix('our-clients')->group(function () {
            Route::get('', [OurClientController::class, 'index'])->name('ourClient.index');
            Route::post('update', [OurClientController::class, 'update'])->name('ourClient.update');
        });

        Route::prefix('footers')->group(function () {
            Route::get('', [FooterController::class, 'index'])->name('footer.index');
            Route::get('create', [FooterController::class, 'create'])->name('footer.create');
            Route::post('store', [FooterController::class, 'store'])->name('footer.store');
            Route::get('{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');
            Route::post('{id}/update', [FooterController::class, 'update'])->name('footer.update');
            Route::post('{id}/delete', [FooterController::class, 'delete'])->name('footer.delete');
        });

        Route::prefix('our-teams')->group(function () {
            Route::get('', [OurTeamController::class, 'index'])->name('ourTeam.index');
            Route::get('create', [OurTeamController::class, 'create'])->name('ourTeam.create');
            Route::post('store', [OurTeamController::class, 'store'])->name('ourTeam.store');
            Route::get('{id}/edit', [OurTeamController::class, 'edit'])->name('ourTeam.edit');
            Route::post('{id}/update', [OurTeamController::class, 'update'])->name('ourTeam.update');
            Route::post('{id}/delete', [OurTeamController::class, 'delete'])->name('ourTeam.delete');
        });

        Route::prefix('services')->group(function () {
            Route::get('', [ServiceController::class, 'index'])->name('service.index');
            Route::get('create', [ServiceController::class, 'create'])->name('service.create');
            Route::post('store', [ServiceController::class, 'store'])->name('service.store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('service.update');
            Route::post('{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');
        });

        Route::prefix('blogs')->group(function () {
            Route::get('', [BlogController::class, 'index'])->name('blog.index');
            Route::get('create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('store', [BlogController::class, 'store'])->name('blog.store');
            Route::get('{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::post('{id}/update', [BlogController::class, 'update'])->name('blog.update');
            Route::post('{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
        });

        Route::prefix('portfolios')->group(function () {
            Route::get('', [PortfolioController::class, 'index'])->name('portfolio.index');
            Route::get('create', [PortfolioController::class, 'create'])->name('portfolio.create');
            Route::post('store', [PortfolioController::class, 'store'])->name('portfolio.store');
            Route::get('{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
            Route::post('{id}/update', [PortfolioController::class, 'update'])->name('portfolio.update');
            Route::post('{id}/delete', [PortfolioController::class, 'delete'])->name('portfolio.delete');
        });

        Route::prefix('category-portfolios')->group(function () {
            Route::get('', [CategoryPortfolioController::class, 'index'])->name('categoryPortfolio.index');
            Route::get('create', [CategoryPortfolioController::class, 'create'])->name('categoryPortfolio.create');
            Route::post('store', [CategoryPortfolioController::class, 'store'])->name('categoryPortfolio.store');
            Route::get('{id}/edit', [CategoryPortfolioController::class, 'edit'])->name('categoryPortfolio.edit');
            Route::post('{id}/update', [CategoryPortfolioController::class, 'update'])->name('categoryPortfolio.update');
            Route::post('{id}/delete', [CategoryPortfolioController::class, 'delete'])->name('categoryPortfolio.delete');
        });

        Route::prefix('our-client')->group(function () {
            Route::get('', [ContactController::class, 'index'])->name('contact.index');
            Route::post('update', [ContactController::class, 'update'])->name('contact.update');
        });
    });
});
