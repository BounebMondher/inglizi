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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('grades', ['as' => 'grades', 'uses' => 'GradesController@index']);
    Route::get('grades/create', ['as' => 'grades.create', 'uses' => 'GradesController@create']);
    Route::get('grades/edit/{id}', ['as' => 'grades.edit', 'uses' => 'GradesController@edit']);
    Route::get('grades/destroy/{id}', ['as' => 'grades.destroy', 'uses' => 'GradesController@destroy']);
    Route::get('grades/show/{id}', ['as' => 'grades.show', 'uses' => 'GradesController@show']);
    Route::post('grades/update/{id}', ['as' => 'grades.update', 'uses' => 'GradesController@update']);
    Route::post('grades/store', ['as' => 'grades.store', 'uses' => 'GradesController@store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('units/create/{selectedGradeID?}', ['as' => 'units.create', 'uses' => 'UnitsController@create']);
    Route::get('units/edit/{id}/{selectedGradeID?}', ['as' => 'units.edit', 'uses' => 'UnitsController@edit']);
    Route::get('units/destroy/{id}/{selectedGradeID?}', ['as' => 'units.destroy', 'uses' => 'UnitsController@destroy']);
    Route::get('units/show/{id}', ['as' => 'units.show', 'uses' => 'UnitsController@show']);
    Route::post('units/update/{id}', ['as' => 'units.update', 'uses' => 'UnitsController@update']);
    Route::post('units/store', ['as' => 'units.store', 'uses' => 'UnitsController@store']);
    Route::get('units/{selectedGradeID?}', ['as' => 'units', 'uses' => 'UnitsController@index']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('lessons/create/{selectedUnitID?}', ['as' => 'lessons.create', 'uses' => 'LessonsController@create']);
    Route::get('lessons/edit/{id}/{selectedUnitID?}', ['as' => 'lessons.edit', 'uses' => 'LessonsController@edit']);
    Route::get('lessons/destroy/{id}/{selectedUnitID?}', ['as' => 'lessons.destroy', 'uses' => 'LessonsController@destroy']);
    Route::get('lessons/show/{id}', ['as' => 'lessons.show', 'uses' => 'LessonsController@show']);
    Route::post('lessons/update/{id}', ['as' => 'lessons.update', 'uses' => 'LessonsController@update']);
    Route::post('lessons/store', ['as' => 'lessons.store', 'uses' => 'LessonsController@store']);
    Route::get('lessons/{selectedUnitID?}', ['as' => 'lessons', 'uses' => 'LessonsController@index']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('sections/create/{selectedLessonID?}', ['as' => 'sections.create', 'uses' => 'SectionsController@create']);
    Route::get('sections/edit/{id}/{selectedLessonID?}', ['as' => 'sections.edit', 'uses' => 'SectionsController@edit']);
    Route::get('sections/destroy/{id}/{selectedLessonID?}', ['as' => 'sections.destroy', 'uses' => 'SectionsController@destroy']);
    Route::get('sections/show/{id}', ['as' => 'sections.show', 'uses' => 'SectionsController@show']);
    Route::post('sections/update/{id}', ['as' => 'sections.update', 'uses' => 'SectionsController@update']);
    Route::post('sections/store', ['as' => 'sections.store', 'uses' => 'SectionsController@store']);
    Route::get('sections/{selectedLessonID?}', ['as' => 'sections', 'uses' => 'SectionsController@index']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('contents/create/{selectedSectionID}', ['as' => 'contents.create', 'uses' => 'ContentsController@create']);
    Route::get('contents/edit/{id}/{selectedSectionID}', ['as' => 'contents.edit', 'uses' => 'ContentsController@edit']);
    Route::get('contents/destroy/{id}/{selectedSectionID}', ['as' => 'contents.destroy', 'uses' => 'ContentsController@destroy']);
    Route::get('contents/show/{id}', ['as' => 'contents.show', 'uses' => 'ContentsController@show']);
    Route::post('contents/update/{id}', ['as' => 'contents.update', 'uses' => 'ContentsController@update']);
    Route::post('contents/store', ['as' => 'contents.store', 'uses' => 'ContentsController@store']);
    Route::get('contents/{selectedSectionID}', ['as' => 'contents', 'uses' => 'ContentsController@index']);
});
