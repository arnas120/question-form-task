<?php

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


Route::get('/', function() {
    return view('Home');
});


Route::get('/finished', function() {
    return view('FormFinished');
});

Route::get('/results', 'FormRenderController@renderForm')->name('submit-form');

Route::post('/submit', 'FormProcessingController@submitForm')->name('submit-form');