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
Route::group(['prefix'=>'api/v1.0'], function()
{
    Route::get('/book/all', 'BookController@all_book');
    Route::get('/book/user/{id}', 'BookController@index');
    Route::post('/book/add', 'BookController@store');
    Route::post('/book/{id}', 'BookController@update');
    Route::delete('/book/{id}', 'BookController@destroy');

    Route::get('/author/all', 'AuthorController@index');
    Route::get('/author/book/{id}', 'AuthorController@author_in_books');




    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'AuthController@login');
        Route::post('registration', 'AuthController@registration');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

});


