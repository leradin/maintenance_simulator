<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Practice;
use App\Stage;
use App\Exercise;
use App\User;

class PracticeController extends Controller{
     public $successStatus = 200;

     public function show(Request $request){
    	$practice = Practice::with('materials','tools','instruments','knowledge','objectives','activities','hardwareBehaviors','softwareBehaviors','sensors','sedamFails','moxaFails','unitType','errorType')->find($request->practice_id);

        $practice['user'] = $practice->users()->where('user_id',$request->user_id)->get()->first();

    	if($practice)
			return response()->json(['success' => $practice], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
		else
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceAnswer(Request $request){
        $practice = Practice::with('users')->find($request->practice_id);

    	/*$practice->users()->attach($request->user_id,['practice_id'=>$practice->id, 
                                                      'answer'=>$request->answer,
                                                      'exercise_id' => $request->exercise_id]);*/
        $practice->users()->wherePivot('exercise_id',$request->exercise_id)->updateExistingPivot($request->user_id,['answer' => $request->answer],false);
    	if($practice)
			return response()->json(['success' =>$request->all()], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
		else
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceQualify(Request $request){
        $practice = Practice::find($request->practice_id);
        $response = $practice->users()->wherePivot('exercise_id',$request->exercise_id)->updateExistingPivot($request->user_id,['passed' => intval($request->pass)],false);
        //
        return response()->json(['success' => ["response" => $practice->users()->wherePivot('exercise_id',$request->exercise_id)->get()]], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    }

    public function practiceUserAnswer(Request $request){
         $exercise =  \App\Exercise::find($request->exercise_id);
    
        foreach ($exercise->stages as $stage) {
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
        }
       
        return response()->json(['success' => ["response" => $exercise]], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    }
}
