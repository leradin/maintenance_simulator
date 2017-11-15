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
Route::get('/home', 'HomeController@index');

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

Route::get('/send_kinect',function(Request $request){
    event(new \App\Events\EventName($request->all()));
    return $request->all();
});

Route::get('/test',function(Request $request){
    $exercise =  \App\Exercise::find($request->exercise_id);
    
    foreach ($exercise->stages as $stage) {
        $stage ['unitType'] = (\App\UnitType::find($stage->pivot->table_id));
        $stage ['user'] = (\App\User::find($stage->pivot->user_id));
        foreach ($stage->practices as $practice) {
            $user = \App\User::find($stage->pivot->user_id);
            $practice['user'] = $user;
            
        }
        //$stage = \App\Stage::find($stage->id);
        //foreach ($stage->practices as $practice) {

        //    $user = \App\User::find($stage->pivot->user_id);
        //    $exercise['stages'][$stage->id]['user'] = $user;
            //foreach ($exercise->users as $user) {
                //if($user->id == $request->user_id)
                //{
                //    $user = \App\User::find($request->user_id);
                //    break;
                //}
            
        //}
         //# code...
    } 
    //$practice = \App\Practice::find($request->practice_id);
    //$user = $practice->users()->orderBy('id', 'desc')->get()->last();
    

        //$response = $practice->users()->wherePivot('id',$user->pivot->id)->updateExistingPivot($request->user_id,['passed' => intval($request->pass)],false);
        return response()->json(['success' => ["response" => $exercise]], 200,array('Access-Control-Allow-Origin' => '*'));
    });

Route::get('fire',function () {
    // this fires the event
    //event(new \App\Events\EventName("algooo"));
    //return "event fired";
    $commands = ['cd /Users/leninvladimirramirez/Development/laravel/maintenance_simulator/storage/app/public/grabacion',
        'screen -d -m ./grabacionMando.sh'
            ];
    SSH::run($commands, function($line){
        echo $line.PHP_EOL;
    });
});

Route::get('fire2',function () {
    $commands = ['cd /Users/leninvladimirramirez/Development/laravel/maintenance_simulator/storage/app/public/grabacion',
        'screen -d -m ./killgrabacionMando.sh'
    ];
    SSH::run($commands, function($line){
        echo $line.PHP_EOL;
    });
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



Auth::routes();

