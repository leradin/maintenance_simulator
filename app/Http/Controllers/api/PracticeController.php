<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Practice;
use App\Stage;
use App\Exercise;
use App\User;

class PracticeController extends Controller
{
     public $successStatus = 200;

     public function show($id){
    	$practice = Practice::with('materials','tools','instruments','knowledge','objectives','activities','hardwareBehaviors','softwareBehaviors','sensors','sedamFails','moxaFails','unitType','errorType')->find($id);
    	if($practice)
			return response()->json(['success' => $practice], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
		else
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceAnswer(Request $request){
    	$practice = Practice::find($request->practice_id);
    	$practice->users()->attach($request->user_id,['practice_id'=>$practice->id, 'answer'=>$request->answer]);
    	
    	if($practice)
			return response()->json(['success' => $request->all()], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
		else
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceQualify(Request $request){
        $practice = Practice::find($request->practice_id);
        $user = $practice->users()->orderBy('id', 'desc')->get()->last();
        $response = $practice->users()->wherePivot('id',$user->pivot->id)->updateExistingPivot($request->user_id,['passed' => intval($request->pass)],false);
        return response()->json(['success' => ["response" => $response]], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceUserAnswer(Request $request){
        $response = array();

        //$exercise = Exercise::find($request->exercise_id);
        $exercises= Exercise::where('id',$request->exercise_id)
                                ->where('status', '2')
                                ->get();
        //$response["exercise"] = $exercise;
        foreach ($exercises as $exercise) {
        //    $response["exercise"] = $exercise->doesntHave('stages')->get();
            foreach ($exercise->stages as $stage) {
                if($stage->id == $request->stage_id){
                    //$response[$stage->id] = $stage;
                    foreach ($stage->users as $user) {
                        if($user->id == $request->user_id){
                            //$response[] = $user;
                            foreach ($user->practices as $practice) {
                                $response[] = $practice;
                            }
                        }
                    }
                }
                //$stage2 = Stage::where('id',$request->stage_id)->get();
                //$response["exercise"]["stage"] = $stage2;

            }
        }
        
        //$stage = User::find($user_id)->books()->where('bookname', '=', 'www')->first();
        /*foreach ($exercise->stages as $stage) {
            if($stage->id == $request->stage_id){
                $response["exercise"][$stage->id] = $stage;
                break;
            }
            
            //foreach ($stage->users as $user) {
            //    $user = User::find($request->stage_id);
            //}
        }*/
        //$stage = Stage::find($request->stage_id);
       
        return response()->json(['success' => ["response" => $response]], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));


        //$stage_id;
        //$user_id;
    }
}
