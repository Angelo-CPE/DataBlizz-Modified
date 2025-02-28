<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home'); // Points to Home.vue inside resources/js/Pages
})->name('home');

Route::get('/order', function () {
    return Inertia::render('OrderForm'); // Points to OrderForm.vue inside resources/js/Pages
})->name('order');