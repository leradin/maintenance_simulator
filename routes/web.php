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
    return view('home');
});

Route::resource('exercise', 'ExerciseController');

Route::resource('stage', 'StageController');

Route::resource('practice', 'PracticeController');

Route::resource('student', 'StudentController');

Route::resource('user', 'UserController');

Route::resource('degree', 'DegreeController');

Route::resource('ascription', 'AscriptionController');

Route::resource('error_type', 'ErrorTypeController');

Route::resource('unit_type', 'UnitTypeController');

Route::resource('material', 'MaterialController');

Route::resource('tool', 'ToolController');

Route::resource('instrument', 'InstrumentController');

Route::resource('knowledge', 'KnowledgeController');

Route::resource('software_behavior', 'SoftwareBehaviorController');

Route::resource('hardware_behavior', 'HardwareBehaviorController');

Route::resource('objective', 'ObjectiveController');

Route::resource('activitie', 'ActivitieController');

Route::resource('solution', 'SolutionController');

Route::resource('sensor', 'SensorController');

Route::resource('sedam_fail', 'SedamFailController');

Route::resource('moxa_fail', 'MoxaFailController');

Route::get('fire',function () {
    // this fires the event
    event(new \App\Events\EventName("algooo"));
    return "event fired";
});

Route::get('test', function () {
    // this checks for the event
    return view('home');
});

Route::get('studentE/', function(){
	//if ($this->user_model->email_exists($this->input->get('fieldValue'))) {
	$arrayToJs = array();
	$arrayToJs[0] = "#enrollment";
	$arrayToJs[1] = true;


	$arrayError = array();
    $arrayError[0] = "#enrollment";   // FIELDID
    $arrayError[1] = "Your email do not match.. whatever it need to match";  // TEXT ERROR
    $arrayError[2] = "error";   // BOX COLOR

	
	//if(true){
        //return json_encode($arrayToJs);
	return response()->json($arrayError);


    //} else {
    //    echo json_encode(array('email', TRUE));
    //}
});

