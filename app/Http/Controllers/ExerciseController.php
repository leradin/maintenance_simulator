<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use Lang;
use SSH;

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
        $this->cabins[1] = [
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
        $unitTypes = \App\unitType::all();
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
        //dd($request->all());
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
                                                    'table_id' =>$tableId]);
                $stage = \App\Stage::find($value);
                $stage->users()->attach($userId);
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
    public function show(Exercise $exercise)
    {
        
            $exercise = Exercise::with('stages')->find($exercise->id);
            //start exercise
            if($exercise->status==0){
                if(!$this->isStartedExercise()){
                    $exercise->status = 1;
                    $exercise->save();
                    
                    $this->startLogExercise();
                    $this->startRecordExercise();

                    foreach ($exercise->stages as $stage) {
                        $json  = json_decode($stage->pivot->structure, JSON_PRETTY_PRINT);
                        event(new \App\Events\EventName($json));
                    }
                    $message['type'] = 'success';
                    $message['status'] = Lang::get('messages.start_exercise');
                    return redirect('/exercise')->with('message',$message);
                }else{
                    $message['type'] = 'error';
                    $message['status'] = Lang::get('messages.fail_exercise');
                    return redirect('/exercise')->with('message',$message);
                }
            // finish exercise
            }else if($exercise->status==1){
                $exercise->status = 2;
                $exercise->save();

                $this->endLogExercise();
                $this->endRecordExercise();

                $message['type'] = 'success';
                $message['status'] = Lang::get('messages.end_exercise');
                return redirect('/exercise')->with('message',$message);
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
    public function destroy(Exercise $exercise)
    {
        //
    }


    private function startLogExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/logs',
        'screen -d -m ./startLogsMaster.sh'
            ];
        SSH::run($commands, function($line){
            echo $line.PHP_EOL;
        });
        return true;
    }

    private function endLogExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/logs',
        'screen -d -m ./killLogsMaster.sh'
            ];
        SSH::run($commands, function($line){
            echo $line.PHP_EOL;
        });
        return true;
    }

    private function startRecordExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/grabacion',
        'screen -d -m ./grabacionMaster.sh'
            ];
        SSH::run($commands, function($line){
            echo $line.PHP_EOL;
        });
        return true;
    }

    private function endRecordExercise(){
        $commands = ['cd /Users/leninvladimirramirez/scripts/grabacion',
        'screen -d -m ./killgrabacionMaster.sh'
            ];
        SSH::run($commands, function($line){
            echo $line.PHP_EOL;
        });
        return true;
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
