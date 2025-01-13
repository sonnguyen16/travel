<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/services', function () {
    return Inertia::render('Service');
});

Route::get('/services/detail', function () {
    return Inertia::render('ServiceDetail');
});

Route::get('/promo', function () {
    return Inertia::render('Promo');
});

Route::get('/destinations', function () {
    return Inertia::render('Destination');
});

Route::get('/promo/detail', function () {
    return Inertia::render('PromoDetail');
});

Route::get('/booking/step1', function () {
    return Inertia::render('Booking/Step1');
});

Route::get('/booking/step2', function () {
    return Inertia::render('Booking/Step2');
});

Route::get('/booking/step3', function () {
    return Inertia::render('Booking/Step3');
});
