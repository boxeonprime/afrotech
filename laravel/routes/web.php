<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');


Route::get('/donate', 'App\Http\Controllers\CheckoutController@donate')->name('donate');
Route::post('/donate/submit', 'App\Http\Controllers\CheckoutController@submit')->name('submit');

Route::get('/terms', 'App\Http\Controllers\HomeController@terms')->name('terms');
Route::get('/privacy', 'App\Http\Controllers\HomeController@privacy')->name('privacy');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');

Route::get('/apply', 'App\Http\Controllers\HomeController@partner')->name('partner.apply');
Route::post('/apply/wait', 'App\Http\Controllers\ApplyController@apply')->name('apply');


