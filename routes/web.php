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





/*Route::get('/test',function(){
    $data = Cookie::get('practices');
    dd($data);
});

Route::get('/test2',function(){
    //Cookie::forget('practices');
    Cookie::queue(Cookie::forget('practices'));
});

Route::get('/start_practice',function(Request $request){
    $practice = \App\Practice::with('users')->find($request->practice_id);
    $practice->users()->attach($request->user_id,['practice_id'=>$practice->id, 
                                                  'exercise_id' => $request->exercise_id]);
    if($practice)
        
        //if(Session::has('practices')){
            //$practices = \Session::get('practices');
        //}else{
            //$practices = array();
            //array_push($practices, [$request->exercise_id.'|'.$request->user_id => $request->practice_id]);
            //\Session::put('practices',$practices);
        //}
        return response()->json(['success' => $practice], 200,array('Access-Control-Allow-Origin' => '*'));
    else
        return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
});*/


/*Route::get('/test',function(Request $request){
    $exercise =  \App\Exercise::find($request->exercise_id);
    $practice =  \App\Practice::find($request->practice_id);
    $user =  \App\User::find($request->user_id);
    //$exercise->stages()->syncWithoutDetaching([1, 2, 3]);
    //dd($practice->users()->allRelatedIds());
    /*foreach ($exercise->stages as $stage) {
        $stage ['unitType'] = (\App\UnitType::find($stage->pivot->table_id));
        $stage ['user'] = (\App\User::find($stage->pivot->user_id));
        foreach ($stage->practices as $practice) {
            $user = \App\User::find($stage->pivot->user_id);
            $practice['user'] = $user;
            foreach ($user->practices as $practice2) {
                if($practice2->pivot->exercise_id == $stage->pivot->exercise_id 
                    && $user->id == $practice2->pivot->user_id 
                        && $practice->id == $practice2->pivot->practice_id)
                {
                    $practice['answer'] = $practice2->pivot->answer;
                    $practice['passed'] = $practice2->pivot->passed;
                }
                
            }
        }
    }*/
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
    //} 
    //$practice = \App\Practice::find($request->practice_id);
    //$user = $practice->users()->orderBy('id', 'desc')->get()->last();
    

        //$response = $practice->users()->wherePivot('id',$user->pivot->id)->updateExistingPivot($request->user_id,['passed' => intval($request->pass)],false);
        //return response()->json(['success' => ["response" => $exercise]], 200,array('Access-Control-Allow-Origin' => '*'));
    //});

/*Route::get('fire',function () {
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
});*/




