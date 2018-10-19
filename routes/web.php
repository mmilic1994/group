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

Route::get('/questions', 'QuestionController@index');
Route::get('/questions/{id}', 'QuestionController@show');
Route::get('/categories', 'CategoryController@index');

Route::get("/questions/form", "QuestionController@form");

Route::get("/categories", "CategoryController@index");

Route::get("/answers/{id}", 'AnswerController@show');
Route::post("/answers/{id}", 'AnswerController@vote');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create'); //gives the route a name that can be referred to in blade
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::post('/categories/create', 'CategoryController@store');
Route::post('/categories/{id}/edit', 'CategoryController@store');

