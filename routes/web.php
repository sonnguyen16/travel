<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserServiceController;
use App\Http\Controllers\UserPromoController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\UserNewsController;
use App\Http\Controllers\UserRecruitmentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqCateController;

Route::get('/admin', [LoginController::class, 'login'])->name('backend.dashboard.login');
Route::post('/check', [LoginController::class, 'check'])->name('backend.dashboard.login.check');
Route::get('/logout', [LoginController::class, 'logout'])->name('backend.dashboard.login.logout');

Route::prefix('/admin')->group(function () {
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard.home.index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('backend.dashboard.logout');

    Route::get('/order', [OrderController::class, 'index'])->name('backend.dashboard.order.index');
    Route::get('/order/show', [OrderController::class, 'show'])->name('backend.dashboard.order.show');
    Route::get('/order/delete', [OrderController::class, 'delete'])->name('backend.dashboard.order.delete');
    Route::get('/order/status', [OrderController::class, 'status'])->name('backend.dashboard.order.status');

    Route::get('/product', [ProductController::class, 'index'])->name('backend.dashboard.product.index');
	Route::post('/product/store', [ProductController::class,'store'])->name('backend.dashboard.product.store');
	Route::get('/product/edit', [ProductController::class,'edit'])->name('backend.dashboard.product.edit');
    Route::get('/product/delete', [ProductController::class,'delete'])->name('backend.dashboard.product.delete');
    Route::get('/product/delete-img/{id}', [ProductController::class,'deleteImg'])->name('backend.dashboard.product.delete.img');

    Route::get('/user', [UserController::class, 'index'])->name('backend.dashboard.user.index');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('backend.dashboard.user.edit');
    Route::get('/user/delete', [UserController::class, 'delete'])->name('backend.dashboard.user.delete');
    Route::post('/user/store', [UserController::class, 'store'])->name('backend.dashboard.user.store');

    Route::get('/menu', [MenuController::class, 'index'])->name('backend.dashboard.menu.index');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('backend.dashboard.menu.store');
    Route::get('/menu/edit', [MenuController::class, 'edit'])->name('backend.dashboard.menu.edit');
    Route::get('/menu/delete', [MenuController::class, 'delete'])->name('backend.dashboard.menu.delete');
    Route::get('/menu/delete-img', [MenuController::class,'deleteImg'])->name('backend.dashboard.menu.delete.img');

    Route::get('/location', [LocationController::class, 'index'])->name('backend.dashboard.location.index');
    Route::post('/location/store', [LocationController::class, 'store'])->name('backend.dashboard.location.store');
    Route::get('/location/edit', [LocationController::class, 'edit'])->name('backend.dashboard.location.edit');
    Route::get('/location/delete', [LocationController::class, 'delete'])->name('backend.dashboard.location.delete');

    Route::get('/blog', [BlogController::class,'index'])->name('backend.dashboard.blog.index');
	Route::post('/blog/store', [BlogController::class,'store'])->name('backend.dashboard.blog.store');
	Route::get('/blog/edit', [BlogController::class,'edit'])->name('backend.dashboard.blog.edit');
	Route::get('/blog/delete', [BlogController::class,'delete'])->name('backend.dashboard.blog.delete');
    Route::delete('/blog/delete-img/{idImg}/{id}/{lang}', [BlogController::class, 'deleteImg'])->name('backend.dashboard.blog.delete.img');

    Route::prefix('/blog')->group(function () {
        Route::get('/activity', [ActivityController::class,'index'])->name('backend.dashboard.activity.index');
        Route::post('/activity/store', [ActivityController::class,'store'])->name('backend.dashboard.activity.store');
        Route::get('/activity/edit', [ActivityController::class,'edit'])->name('backend.dashboard.activity.edit');
        Route::get('/activity/delete', [ActivityController::class,'delete'])->name('backend.dashboard.activity.delete');
    });

    Route::get('/page', [PageController::class, 'index'])->name('backend.dashboard.pages.index');
    Route::post('/page/store', [PageController::class, 'store'])->name('backend.dashboard.pages.store');
    Route::get('/page/edit', [PageController::class, 'edit'])->name('backend.dashboard.pages.edit');
    Route::get('/page/delete', [PageController::class, 'delete'])->name('backend.dashboard.pages.delete');

    Route::get('/recruitment', [RecruitmentController::class,'index'])->name('backend.dashboard.recruitment.index');
	Route::post('/recruitment/store', [RecruitmentController::class,'store'])->name('backend.dashboard.recruitment.store');
	Route::get('/recruitment/edit', [RecruitmentController::class,'edit'])->name('backend.dashboard.recruitment.edit');
	Route::get('/recruitment/delete', [RecruitmentController::class,'delete'])->name('backend.dashboard.recruitment.delete');

    Route::get('/faq', [FaqController::class,'index'])->name('backend.dashboard.faq.index');
	Route::post('/faq/store', [FaqController::class,'store'])->name('backend.dashboard.faq.store');
	Route::get('/faq/edit', [FaqController::class,'edit'])->name('backend.dashboard.faq.edit');
	Route::get('/faq/delete', [FaqController::class,'delete'])->name('backend.dashboard.faq.delete');

    Route::get('/faq_cate', [FaqCateController::class,'index'])->name('backend.dashboard.faq_cate.index');
	Route::post('/faq_cate/store', [FaqCateController::class,'store'])->name('backend.dashboard.faq_cate.store');
	Route::get('/faq_cate/edit', [FaqCateController::class,'edit'])->name('backend.dashboard.faq_cate.edit');
	Route::get('/faq_cate/delete', [FaqCateController::class,'delete'])->name('backend.dashboard.faq_cate.delete');

    Route::get('/banner', [BannerController::class,'index'])->name('backend.dashboard.banner.index');
    Route::post('/banner/store', [BannerController::class,'store'])->name('backend.dashboard.banner.store');
    Route::get('/banner/edit', [BannerController::class,'edit'])->name('backend.dashboard.banner.edit');
    Route::get('/banner/delete', [BannerController::class,'delete'])->name('backend.dashboard.banner.delete');

    Route::get('/language', [LanguageController::class,'index'])->name('backend.dashboard.language.index');
    Route::post('/language/store', [LanguageController::class,'store'])->name('backend.dashboard.language.store');
    Route::get('/language/edit', [LanguageController::class,'edit'])->name('backend.dashboard.language.edit');
    Route::get('/language/delete', [LanguageController::class,'delete'])->name('backend.dashboard.language.delete');
});

Route::get('/', [UserHomeController::class, 'index'])->name('home');
Route::get('/ve-chung-toi', function () {
    return Inertia::render('About');
});

Route::get('/dich-vu', [UserServiceController::class, 'index'])->name('service');
Route::get('/dich-vu/{title?}', [UserServiceController::class, 'show'])->name('service.show');

Route::get('/uu-dai', [UserPromoController::class, 'index'])->name('promo');
Route::get('/uu-dai/{title?}', [UserPromoController::class, 'show'])->name('promo.show');

Route::get('/dat-ve/buoc1', [UserBookingController::class, 'index'])->name('booking');
Route::get('/dat-ve/buoc2', [UserBookingController::class, 'cart'])->name('cart');
Route::get('/dat-ve/buoc3', [UserBookingController::class, 'pay'])->name('pay');
Route::post('/dat-ve/buoc4', [UserBookingController::class, 'confirm'])->name('confirm');

Route::get('/trang/{title?}', [UserPageController::class, 'show'])->name('page.show');
Route::get('/faq', [UserPageController::class, 'faq'])->name('page.show');

Route::get('/tin-tuc', [UserNewsController::class, 'index'])->name('news');
Route::get('/tin-tuc/{category_slug?}', [UserNewsController::class, 'category'])->name('news.category');
Route::get('/tin-tuc/{category_slug?}/{title?}', [UserNewsController::class, 'show'])->name('news.show');

Route::get('/tuyen-dung', [UserRecruitmentController::class, 'index'])->name('recruitment');
Route::get('/tuyen-dung/{title?}', [UserRecruitmentController::class, 'show'])->name('recruitment.show');

Route::get('/hoat-dong', [UserBlogController::class, 'activity'])->name('activity');

Route::get('/{slug?}', [UserBlogController::class, 'index'])->name('blog');
Route::get('/{slug?}/{title?}', [UserBlogController::class, 'show'])->name('blog.show');





