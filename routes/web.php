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
        'middleware' => [
            'auth:web',
        ]

    ],

    function () {
        Route::get('/file/download/{multimedia_id}', 'MultimediaController@download')->name('file-download');
    });


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
    Route::get('/home', 'Lecturer\HomeController@home')->name('lecturer-home');
    Route::get('/my-class-list', 'Lecturer\CourseSubjectUserController@my_list')->name('lecturer-my-class-list');
    Route::get('/classroom/{course_subject_id}', 'Lecturer\CourseSubjectController@view')->name('lecturer-view-classroom');
    Route::get('/class/{course_subject_id}/{lecturer_id}/students-list', 'Lecturer\CourseSubjectUserController@view_class_students')->name('lecturer-class-student-list');
    Route::post('/store-post/{course_subject_user_id}', 'Lecturer\PostController@store')->name('lecturer-store-post');
    Route::post('/store-comment/{post_id}', 'Lecturer\CommentController@store')->name('lecturer-store-comment');

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
    Route::get('/view-user/{user_id}', 'Admin\UserController@view')->name('admin-user-view');
    Route::get('/create-user', 'Admin\UserController@create')->name('admin-user-create');
    Route::post('/store-user', 'Admin\UserController@store')->name('admin-user-store');
    Route::get('/edit-user/{user_id}', 'Admin\UserController@edit')->name('admin-user-edit');
    Route::get('/list-users', 'Admin\UserController@list')->name('admin-user-list');
    Route::put('/update-user/{user_id}', 'Admin\UserController@update')->name('admin-user-update');
    Route::delete('/delete-user/{user_id}', 'Admin\UserController@delete')->name('admin-user-delete');
    Route::get('/create-semester', 'Admin\SemesterController@create')->name('admin-semester-create');
    Route::get('/add-semester-to-academic-year', 'Admin\SemesterController@add_semester_to_ay')->name('admin-add-semester-to-academic-year');
    Route::post('/store-semester', 'Admin\SemesterController@store')->name('admin-semester-store');
    Route::post('/store-semester-to-academic-year', 'Admin\SemesterController@store_semester_to_ay')->name('admin-store-semester-to-academic-year');
    Route::get('/create-course', 'Admin\CourseController@create')->name('admin-course-create');
    Route::get('/courses/ay-semester/{academic_year_semester_id}', 'Admin\CourseController@courses_by_semester_ay')->name('admin-course-by-ay-semester');
    Route::post('/store-course', 'Admin\CourseController@store')->name('admin-course-store');
    Route::get('/create-section', 'Admin\SectionController@create')->name('admin-section-create');
    Route::post('/store-section', 'Admin\SectionController@store')->name('admin-section-store');
    Route::get('/create-college', 'Admin\CollegeController@create')->name('admin-college-create');
    Route::post('/store-college', 'Admin\CollegeController@store')->name('admin-college-store');
    Route::get('/create-subject', 'Admin\SubjectController@create')->name('admin-subject-create');
    Route::post('/store-subject', 'Admin\SubjectController@store')->name('admin-subject-store');
    Route::get('/add-subject-to-course', 'Admin\CourseSubjectController@create')->name('admin-add-subject-to-course');
    Route::post('/store-subject-to-course', 'Admin\CourseSubjectController@store')->name('admin-store-subject-to-course');
    Route::get('/view-classes', 'Admin\CourseSubjectController@view_classes')->name('admin-view-classes');
    Route::get('/enroll-student', 'Admin\CourseSubjectUserController@enroll')->name('admin-enroll-student');
    Route::get('/add-lecturer-to-course', 'Admin\CourseSubjectUserController@add_lecturer')->name('admin-add-lecturer-to-course');
    Route::get('/view-students/{course_subject_id}', 'Admin\CourseSubjectUserController@students_list')->name('admin-view-students');
    Route::post('/store-enroll-student', 'Admin\CourseSubjectUserController@store_enroll')->name('admin-store-enroll-student');
    Route::post('/store-add-lecturer-to-course', 'Admin\CourseSubjectUserController@store_add_lecturer')->name('admin-store-add-lecturer-to-course');

});
