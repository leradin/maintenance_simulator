<?php
use Illuminate\Http\Request;
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
Route::get('/', 'HomeController@index');

/* Login */
Auth::routes();

/* Exercises */
Route::resource('exercise', 'ExerciseController');

/* Stages */
Route::resource('stage', 'StageController');

/* Catalogs */
Route::get('/catalog',function(){
    return view('catalog.index');
});

/* Practice catalog */
Route::resource('practice', 'PracticeController');

/* Student catalog */
Route::resource('student', 'StudentController');

/* User catalog */
Route::resource('user', 'UserController');

/* Degree catalog */
Route::resource('degree', 'DegreeController');

/* Ascription catalog */
Route::resource('ascription', 'AscriptionController');

/* Error Type catalog */
Route::resource('error_type', 'ErrorTypeController');

/* Unit Type catalog */
Route::resource('unit_type', 'UnitTypeController');

/* Material catalog */
Route::resource('material', 'MaterialController');

/* Tool catalog */
Route::resource('tool', 'ToolController');

/* Instrument catalog */
Route::resource('instrument', 'InstrumentController');

/* Knowledge catalog */
Route::resource('knowledge', 'KnowledgeController');

/* Software behavior catalog */
Route::resource('software_behavior', 'SoftwareBehaviorController');

/* Hardware behavior catalog */
Route::resource('hardware_behavior', 'HardwareBehaviorController');

/* Objective catalog */
Route::resource('objective', 'ObjectiveController');

/* Activitie catalog */
Route::resource('activitie', 'ActivitieController');

/* Solution catalog */
Route::resource('solution', 'SolutionController');

/* Sensor catalog */
Route::resource('sensor', 'SensorController');

/* Sedam fail catalog */
Route::resource('sedam_fail', 'SedamFailController');

/* Moxa fail catalog */
Route::resource('moxa_fail', 'MoxaFailController');

/* Send data (Sensor,fails sedam and moxa) kinect */
Route::get('/send_kinect',function(Request $request){
    event(new \App\Events\RequestEvent($request->all()));
    return response()->json($request->all());
});

/* Start and finish practice */
Route::get('/start_practice','ExerciseController@startPractice');
Route::get('/finish_practice','ExerciseController@finishPractice');

/* Report */
Route::prefix('report')->group(function () {
    Route::get('/','ReportController@index');
    Route::get('show','ReportController@show');
    Route::get('pdf/{exercise_id}','ReportController@pdf');
});

/* API Controller */
Route::get('/settings', 'SettingsController@index')->name('settings');

/* API View */
Route::get('/client','ClientController@index')->middleware('auth');

Route::get('/pdf',function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});

Route::get('/user_edit',function(){
    $user = Auth::user();
    $degrees = \App\Degree::get()->pluck('name_abbreviation','id');
    $ascriptions = \App\Ascription::get()->pluck('name_abbreviation','id');

    return view('user.edit',['degrees' => $degrees,'ascriptions' => $ascriptions,'user' => $user]);
})->name('user_edit');
