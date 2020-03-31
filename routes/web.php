<?php

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

Route::get('/example', function () {
    return ['value' => true];
})->name('example');

Route::get('/', function () {
    return view('index', ['title' => 'Home']);
});

Route::post('/send-sms', 'MessageController');
