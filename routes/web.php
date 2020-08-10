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
    return view('home');
});

Route::name('quiz.index')->get('/quiz', 'QuizController@index');
Route::name('quiz.store')->post('/quiz', 'QuizController@store');

Route::name('quizdetails.store')->post('/quiz/details', 'QuizDetailsController@store');
