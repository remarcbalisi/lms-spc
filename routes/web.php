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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
    
    [   
        'prefix' => 'learner',
        'middleware' => [
            'auth:web',
            'learner_acc'
        ]

    ],
    
    function () {
    Route::get('/home', 'Learner\UserController@home')->name('learner-home');

});

Route::group(
    
    [   
        'prefix' => 'lecturer',
        'middleware' => [
            'auth:web',
            'lecturer_acc'
        ]

    ],
    
    function () {
    Route::get('/home', 'Lecturer\UserController@home')->name('lecturer-home');

});


Route::group(
    
    [   
        'prefix' => 'admin',
        'middleware' => [
            'auth:web',
            'admin_acc'
        ]

    ],
    
    function () {
    Route::get('/home', 'Admin\UserController@home')->name('admin-home');

});
