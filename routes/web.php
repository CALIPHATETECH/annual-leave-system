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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    
    Route::name('staff.')
    ->prefix('/staff')
    ->group(function (){
        Route::get('/', 'StaffController@index')->name('index');    
        Route::post('/register', 'StaffController@register')->name('register');    
        Route::post('/{staffId}/update', 'StaffController@update')->name('update');    
        Route::get('/{staffId}/delete', 'StaffController@delete')->name('delete');        
    });

    Route::name('application.')
    ->prefix('/application')
    ->group(function (){
        Route::get('/', 'ApplicationController@index')->name('index');    
        Route::get('/{staffId}/create', 'ApplicationController@create')->name('create');    
        Route::post('/{staffId}/register', 'ApplicationController@register')->name('register');    
        Route::post('/{ApplicationId}/update/{status}', 'ApplicationController@update')->name('update');    
        Route::get('/{ApplicationId}/response/{status}', 'ApplicationController@response')->name('response');    
        Route::get('/{ApplicationId}/delete', 'ApplicationController@delete')->name('delete');        
    });

    
    
});