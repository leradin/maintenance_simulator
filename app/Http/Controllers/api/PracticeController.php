<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Practice;

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
}
