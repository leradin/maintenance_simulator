<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'api'], function () {
    Route::post('/login', 'UserController@login');
    Route::post('/details', 'UserController@details')->middleware('auth:api');
});*/

Route::post('login', 'api\UserController@login');

Route::post('register', 'api\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

	// details for user
	Route::post('details', 'api\UserController@details');
	//details for exercise
	Route::post('exercise/{user_id}','api\ExerciseController@show');
	//detaills finish exercises
	Route::post('finished_exercises','api\ExerciseController@finishedExercises');
	// detail practice
	Route::post('practice','api\PracticeController@show');
	// answer practice 
	Route::post('practice_answer','api\PracticeController@practiceAnswer');	
	// quialify practice
	Route::post('practice_quialify','api\PracticeController@practiceQualify');
	// details practice complete with answer and qualift
	Route::post('practice_user_answer','api\PracticeController@practiceUserAnswer');
});
