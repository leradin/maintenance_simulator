<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Exercise;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    public $successStatus = 200;

    public function ver($userId){
    	$exercises = Exercise::where('status',1)->get();
    	$stages = array();
    	$practices = array();
    	$count = 0;

    	foreach ($exercises as $exercise) {
    		$stageCount = 0;
			foreach ($exercise->stages as $stage) {
				$stages[$stageCount] = [
									'id' => $stage->id,
									'name' => $stage->name,
									'description' => $stage->description
									];

				foreach ($stage->users as $user) {
					if($userId == $user->id){
						foreach ($stage->practices as $practice) {
							$stages[$stageCount]['practices'][]= \App\Practice::with('materials','tools','instruments','knowledge','objectives','activities','hardwareBehaviors','softwareBehaviors','sensors','sedamFails','moxaFails','unitType','errorType')->find($practice->id);
							$count++;
						}
					}
				}
				$stageCount++;
				
			}
    	}

    	if($count>0){
    		return response()->json(['success' => $stages], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    	}else{
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    	}
    	
    }

    public function current(){
    	$exercises = Exercise::where('status',1)->get();
    	$stages = array();
    	$practices = array();
    	$count = 0;

    	foreach ($exercises as $exercise) {
    		$stageCount = 0;
			foreach ($exercise->stages as $stage) {
				$stages[$stageCount] = [
									'id' => $stage->id,
									'name' => $stage->name,
									'description' => $stage->description
									];

				foreach ($stage->users as $user) {
						$user = \App\User::with('degree','ascription')->find($user->id);
						$stages[$stageCount]['users'][] = $user;
						foreach ($stage->practices as $practice) {
								
								$practice->with('materials','tools','instruments','knowledge','objectives','activities','hardwareBehaviors','softwareBehaviors','sensors','sedamFails','moxaFails','unitType','errorType')->get();

								//$practice['activites']['solutions'] = $practice->activities()->with('solutions')->get();

								$stages[$stageCount]['practices'][]= $practice;
							$count++;
						}
				}
				$stageCount++;
				
			}
    	}

    	if($count>0){
    		return response()->json(['success' => $stages], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    	}else{
			return response()->json(['error'=>'Not Found'], 404, array('Access-Control-Allow-Origin' => '*'));
    	}
    }
}
