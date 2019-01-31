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
    Route::get('/create-academic-year', 'Admin\AcademicYearController@create')->name('admin-academic-year-create');
    Route::post('/store-academic-year', 'Admin\AcademicYearController@store')->name('admin-academic-year-store');
    Route::get('/list-academic-year', 'Admin\AcademicYearController@list')->name('admin-academic-year-list');
    Route::get('/view-academic-year/{year_id}', 'Admin\AcademicYearController@view')->name('admin-academic-year-view');
    Route::get('/edit-academic-year/{year_id}', 'Admin\AcademicYearController@edit')->name('admin-academic-year-edit');
    Route::put('/update-academic-year/{year_id}', 'Admin\AcademicYearController@update')->name('admin-academic-year-update');
    Route::delete('/delete-academic-year/{year_id}', 'Admin\AcademicYearController@delete')->name('admin-academic-year-delete');
    Route::get('/create-user', 'Admin\UserController@create')->name('admin-user-create');
    Route::post('/store-user', 'Admin\UserController@store')->name('admin-user-store');

});
