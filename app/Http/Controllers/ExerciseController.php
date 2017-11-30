<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lang;
use SSH;
use Cookie;
use Carbon\Carbon;


class ExerciseController extends Controller
{
    public $tracks =[
                        array(
                            "id" => 1,
                            "name" => "b1",
                            "mmsi" => 931783846,
                            "nav_status" => 0,
                            "position"=> array(
                                "lat" => "18.098261",
                                "lon" => "-94.587204"
                            ),
                            "course" => "89",
                            "speed" => "20",
                            "source" => "AIS",
                            "kinect_model" => "standar",
                            "identity" => "desconocido",
                            "battle_dimension" => "superficie",
                            "properties" => array(
                                "motors" => [
                                    array(
                                        "type" => "telegrafo",
                                        "model" => "modelo A",
                                        "maxSpeed" => 20,
                                        "health" => 1,
                                        "position" => "left"
                                    ),
                                    array(
                                        "type" => "telegrafo",
                                        "model" => "modelo A",
                                        "maxSpeed" => 20,
                                        "health" => 1,
                                        "position" => "right"
                                    )
                                ],
                                "timon" => [
                                    array(
                                        "type" => "aguja"
                                    )
                                ]
                            )
                        ),
                        array(
                            "id" => 88,
                            "name"=> "EL_GRAN_B",
                            "mmsi"=> 931790846,
                            "nav_status"=> 0,
                            "position"=> array(
                                "lat"=> "19.84823683923858",
                                "lon"=> "-94.9432785122061"
                            ),
                            "course"=> "89",
                            "speed"=> "20",
                            "source"=> "AIS",
                            "kinect_model"=> "standar",
                            "identity"=> "desconocido",
                            "battle_dimension"=> "superficie",
                            "properties"=> array(
                                "motors"=> [
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "left"
                                    ),
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "right"
                                    )
                                ],
                                "timon"=> [
                                    array(
                                        "type"=> "aguja"
                                    )
                                ]
                            )
                        ),
                        array(
                            "id"=> 2,
                            "name"=> "b2",
                            "mmsi"=> 801083473,
                            "nav_status"=> 0,
                            "position"=> array(
                                "lat"=> "19.114654501900077",
                                "lon"=> "-95.7623291015625"
                            ),
                            "course"=> "56",
                            "speed"=> "8",
                            "source"=> "RADAR_A",
                            "kinect_model"=> "standar",
                            "identity"=> "desconocido",
                            "battle_dimension"=> "superficie",
                            "properties"=> array(
                                "motors"=> [
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "left",
                                        "power"=> 5
                                    ),
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "right",
                                        "power"=> 5
                                    )
                                ],
                                "timon"=> [
                                    array(
                                        "type"=> "aguja"
                                    )
                                ]
                            )
                        ),
                        array(
                            "id"=> 4,
                            "name"=> "b4",
                            "mmsi"=> 801083483,
                            "nav_status"=> 0,
                            "position"=> array(
                                "lat"=> "19.706359785050154",
                                "lon"=> "-94.89990234375"
                            ),
                            "course"=> "56",
                            "speed"=> "8",
                            "source"=> "RADAR_A",
                            "kinect_model"=> "standar",
                            "identity"=> "desconocido",
                            "battle_dimension"=> "superficie",
                            "properties"=> array(
                                "motors"=> [
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "power"=> 5,
                                        "position"=> "right"
                                    ),
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "power"=> 5,
                                        "position"=> "left"
                                    )
                                ],
                                "timon"=> [
                                    array(
                                        "type"=> "aguja"
                                    )
                                ]
                            )
                        ),
                        array(
                            "id"=> 3,
                            "name"=> "b3",
                            "mmsi"=> 790540348,
                            "nav_status"=> 0,
                            "position"=> array(
                                "lat"=> "19.043243369087577",
                                "lon"=> "-95.55908203125"
                            ),
                            "course"=> "34",
                            "speed"=> "3",
                            "source"=> "AIS",
                            "kinect_model"=> "standar",
                            "identity"=> "desconocido",
                            "battle_dimension"=> "superficie",
                            "properties"=> array(
                                "motors"=> [
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "right"
                                    ),
                                    array(
                                        "type"=> "telegrafo",
                                        "model"=> "modelo A",
                                        "maxSpeed"=> 20,
                                        "health"=> 1,
                                        "position"=> "left"
                                    )
                                ],
                                "timon"=> [
                                    array(
                                        "type"=> "aguja"
                                    )
                                ]
                            )
                        )
                    ];
    public $unit = [
        "id"=> 2,
        "station"=> 518,
        "name"=> "ARM_MENKALINAN",
        "numeral"=> "PI_1415",
        "country_code"=> "MX",
        "kinect_model"=> 1,
        "properties"=> array(
            "motors"=> [
                array(
                    "type"=> "telegrafo",
                    "model"=> "modelo A",
                    "maxSpeed"=> 20,
                    "health"=> 1,
                    "position"=> "right"
                ),
                array(
                    "type"=> "telegrafo",
                    "model"=> "modelo A",
                    "maxSpeed"=> 20,
                    "health"=> 1,
                    "position"=> "left"
                )
            ],
            "timon"=> [
                array(
                    "type"=> "volante",
                    "value"=> array(
                        "pitch"=> 0,
                        "rotation"=> 0
                    )
                )
            ]
        )
    ];
    public $cabins = array();
    

    public function __construct()
    {
        $this->middleware('auth');
        $this->cabins['cabins']['1'] = [
            'init_position' => array(
                    "lat" => "19.450317561626434",
                    "lon"=> "-94.3505859375"
                    ),
            'altitud' => 0,
            'course' => 90,
            'speed' => 5,
            'cabin_id' => 1,
            'unit_id' => 2,
            'stage_id' => 4,
            'unit' => $this->unit
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercise.index',['exercises' => $exercises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages =  \App\Stage::all();
        $users =  \App\User::where('user', 0)->get();
        $unitTypes = \App\UnitType::all();
        return view('exercise.create',[ 'stages' => $stages,
                                        'users' => $users,
                                        'unitTypes' => $unitTypes
                                      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($this->noDupes($request->get('users_id'))){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_user_duplicate');
            return back()->withInput()->with('message',$message);
        }

        if($this->noDupes($request->get('tables_id'))){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_table_duplicate');
            return back()->withInput()->with('message',$message);
        }

        $exercise = Exercise::create([
            'name' =>  $request->name,
            'description' => $request->description,
            'status' => 0
        ]);

        $exercise['date_time_root'] = "2017-10-09 12:00:00";
     
        if($request->has('stages_id')) {
            foreach($request->get('stages_id') as $key => $value){

                $tableId = $request->get('tables_id')[$key];
                $userId = $request->get('users_id')[$key];
           
                $structure = array('idMesa' => $tableId);
                $structure['exercise'] = $exercise;
                $structure['tracks'] = $this->tracks;
                $structure['stage'] = $this->cabins;
                
                $exercise->stages()->attach($value,['date_time'=>$request->date_time,
                                                    'structure'=>json_encode($structure),
                                                    'table_id' =>$tableId,
                                                    'user_id' => $userId]);
                $stage = \App\Stage::find($value);
                $stage->users()->attach($userId,['exercise_id' => $exercise->id]);
            }
        }

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_exercise');
        return redirect('/exercise')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise,Request $request)
    {
            $exercise = Exercise::with('stages')->find($exercise->id);
            $user; //User::find($exercise->pivot->user_id);
            //dd($exercise->stages->pivot->user_id);
            //start exercise
            if($exercise->status==0){
                if(!$this->isStartedExercise()){
                    try{
                        $exercise->status = 1;
                        $exercise->save();
                        
                        //$this->startLogExercise();
                        //$this->startRecordExercise();

                        foreach ($exercise->stages as $stage) {
                            $json  = json_decode($stage->pivot->structure, JSON_PRETTY_PRINT);
                            event(new \App\Events\EventName($json));
                        }
                        $message['type'] = 'success';
                        $message['status'] = Lang::get('messages.start_exercise');
                        //return redirect('/exercise')->with('message',$message);
                        return view('exercise.play',['message' => $message,
                                                     'exercise' => $exercise
                                                    ]);
                    }catch(\Exception $e){
                        $message['type'] = 'error';
                        $message['status'] = Lang::get('messages.fail_exercise');
                        return redirect('/exercise')->with('message',$message);     
                    }
                }else{
                    $message['type'] = 'error';
                    $message['status'] = Lang::get('messages.fail_exercise');
                    return redirect('/exercise')->with('message',$message);
                }
            // finish exercise
            }else if($exercise->status==1){

                if($request->get('play')){
                    $message['type'] = 'success';
                    $message['status'] = Lang::get('messages.start_exercise');
                    return view('exercise.play',['message' => $message,
                                                 'exercise' => $exercise
                                                ]);
                }
                if($request->get('restart')){
                    $exercise->status = 0;
                    $exercise->save();
                    $this->killExercise($exercise);
                    $message['type'] = 'success';
                    $message['status'] = Lang::get('messages.restart_exercise');
                    return redirect('/exercise')->with('message',$message); 
                }


                $exercise->status = 2;
                $exercise->save();
                $this->killExercise($exercise);
                /*foreach ($exercise->stages as $stage) {
                    $kill['idMesa'] = $stage->pivot->table_id; 
                    $kill['topic'] = 'KILL';
                    event(new \App\Events\RequestEvent($kill));
                }*/
                //dd($exercise->stages()->get()->first()->pivot->table_id);

                //$this->endLogExercise();
                //$this->endRecordExercise();

                $message['type'] = 'success';
                $message['status'] = Lang::get('messages.end_exercise');
                return redirect('/exercise')->with('message',$message);
            }else if($exercise->status==2){
                foreach ($exercise->stages as $stage) {
                    $stage['user'] = User::with('Degree','Ascription')->find($stage->pivot->user_id);
                    //$stage->users()->where('practice_user_pivot.exercise_id', 1);
                    foreach ($stage->users->where('practice_user_pivot.exercise_id',2) as $item) {
                        //dd($item);
                    }
                    /*foreach ($stage->practices as $practice) { 
                        foreach ($practice->users as $user) {
                            
                        }               
                    }*/
                }
                
                return view('exercise.show',['exercise' => $exercise]);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise){
        $exercise = Exercise::find($exercise->id);

        if($exercise->stages){
            foreach ($exercise->stages as $stage) {
                $exercise->stages()->detach($stage->id);
                if($stage->users){
                    foreach ($stage->users as $user) {
                        $stage->users()->detach($user->id);
                    }
                }
            }
        }
        
        $exercise->delete();

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_exercise');

        return redirect('/exercise')->with('message',$message);
    }

    public function startPractice(Request $request){
        $practice = \App\Practice::with('users')->find($request->practice_id);
        $practice->users()->attach($request->user_id,['practice_id'=>$practice->id, 
                                                  'exercise_id' => $request->exercise_id]);
        if($practice){
            if(Cookie::get('practices')){
                $practices = Cookie::get('practices');
            }else{
                $practices = array();
            }
            array_push($practices, [$request->exercise_id.'|'.$request->table_id.'|'.$request->user_id.'|'.$request->practice_id => $request->time]);
                Cookie::queue('practices', $practices, $request->time,'/',null, false, true);
            return response()->json(['success' => $practice], 200,array('Access-Control-Allow-Origin' => '*'));
        }else{
            return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
        }
    }

    /*private function startLogExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/logs',
        'screen -d -m ./startLogsMaster.sh'
            ];
        $this->executeCommand($commands);
    }

    private function endLogExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/logs',
        'screen -d -m ./killLogsMaster.sh'
            ];
        $this->executeCommand($commands);
    }

    private function startRecordExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/grabacion',
        'screen -d -m ./grabacionMaster.sh'
            ];
        $this->executeCommand($commands);
    }

    private function endRecordExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/grabacion',
        'screen -d -m ./killgrabacionMaster.sh'
            ];
        $this->executeCommand($commands);
    }

    private function executeCommand($commands){
        
        try{
            SSH::run($commands, function($line){
                echo $line.PHP_EOL;
            });
            return true;
        }
        catch(\Exception $e){
            return false;
        }
    }*/

    private function killExercise(Exercise $exercise){
        Cookie::queue(Cookie::forget('practices'));
        foreach ($exercise->stages as $stage) {
            $kill['idMesa'] = $stage->pivot->table_id; 
            $kill['topic'] = 'KILL';
            event(new \App\Events\RequestEvent($kill));
        }
    }

    private function noDupes(array $array) {
        return count($array) > count(array_unique($array));
    }

    private function isStartedExercise(){
        $exercises = Exercise::all();
        foreach ($exercises as $exercise){
            if($exercise->status == 1){
                return true;
            }
        }
        return false;
    }
}
