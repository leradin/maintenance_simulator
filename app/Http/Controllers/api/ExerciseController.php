<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Exercise;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    public $successStatus = 200;

    public function show($userId){
    	$exercises = Exercise::where('status',1)->get();
    	$stages = array();
    	$practices = array();
    	$count = 0;

    	foreach ($exercises as $exercise) {
    		$stageCount = 0;
			foreach ($exercise->stages as $stage) {

				

				//foreach ($stage->users as $user) {
					//if($userId == $user->id){
						foreach ($stage->users as $user) {
							if($userId == $user->id && $user->pivot->stage_id== $stage->id){
								$stages[$stageCount] = [
									'id' => $stage->id,
									'name' => $stage->name,
									'description' => $stage->description
									];
								$stages[$stageCount]['user'] = $user;
								foreach ($stage->practices as $practice) {
									$stages[$stageCount]['practices'][]= \App\Practice::with('materials','tools','instruments','knowledge','objectives','activities','hardwareBehaviors','softwareBehaviors','sensors','sedamFails','moxaFails','unitType','errorType')->find($practice->id);
									$count++;
								}
								break;
							}
						}
						
					//}
				//}
				$stageCount++;
				
			}
    	}

    	if($count>0){
    		return response()->json(['success' => $stages,'exercise' => $exercise], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    	}else{
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    	}
    	
    }

    public function finishedExercises(){
    	$exercises = Exercise::where('status',2)->get();
    	$currentExercise = array();
    	$practices = array();
    	$count = 0;

    	foreach ($exercises as $exercise) {
    		$stageCount = 0;
    		$currentExercise[] = [$exercise];

			foreach ($exercise->stages as $stage) {

				foreach ($stage->users as $user) {
					
				}
				foreach ($stage->practices as $practice) {
					$practice->users;
					/*foreach ($practice->users as $user) {
						$user->name;
					}*/
					$practice->unitType;
					$practice->errorType;
					foreach ($practice->materials as $material){
					}
					foreach ($practice->tools as $tool){
					}
					foreach ($practice->instruments as $instrument){
					}
					foreach ($practice->knowledge as $knowledg){
					}
					foreach ($practice->objectives as $objective){
					}
					foreach ($practice->activities as $activitie){
						foreach ($activitie->solutions as $solution){
						}
					}
					foreach ($practice->hardwareBehaviors as $hardwareBehavior){
					}
					foreach ($practice->softwareBehaviors as $softwareBehavior){
					}
					foreach ($practice->objectives as $objective){
					}
					foreach ($practice->sensors as $sensor){
					}
					foreach ($practice->sedamFails as $sedamFail){
					}
					foreach ($practice->moxaFails as $moxaFail){
					}
					$count++;
				}
				
				$stageCount++;
				
			}
    	}

    	if($count>0){
    		return response()->json(['success' => $exercises], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    	}else{
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    	}
    }
}
