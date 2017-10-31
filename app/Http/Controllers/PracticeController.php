<?php

namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;
use Lang;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practices = Practice::all();
        return view('practice.index',['practices' => $practices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = \App\Activitie::all();
        $solutions = \App\Solution::all();
        $softwareBehaviors = \App\SoftwareBehavior::all();
        $objectives = \App\Objective::all();
        $materials = \App\Material::all();
        $tools = \App\Tool::all();
        $instruments = \App\Instrument::all();
        $knowledges = \App\Knowledge::all();
        $hardwareBehaviors = \App\HardwareBehavior::all();
        $errorTypes =  \App\ErrorType::all();
        $unitTypes =  \App\UnitType::all();
        $sensors =  \App\Sensor::all();
        $sedamFails =  \App\SedamFail::all();
        $moxaFails =  \App\MoxaFail::all();


        return view('practice.create',['activities' => $activities,
                                       'softwareBehaviors' => $softwareBehaviors,
                                       'objectives' => $objectives,
                                       'materials' => $materials,
                                       'tools' => $tools,
                                       'instruments' => $instruments,
                                       'knowledges' => $knowledges,
                                       'hardwareBehaviors' => $hardwareBehaviors,
                                       'errorTypes' => $errorTypes,
                                       'unitTypes' => $unitTypes,
                                       'solutions' => $solutions,
                                       'sensors' => $sensors,
                                       'sedamFails' => $sedamFails,
                                       'moxaFails' => $moxaFails 
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
        // Step 1
        $practice = Practice::create([
            'name' =>  $request->name,
            'duration' => $request->duration.':00:00',
            'error_type_id' => $request->error_type_id,
            'unit_type_id' => $request->unit_type_id
        ]);


        // Step 2
        if($request->has('material_id')) {
            foreach($request->get('material_id') as $key => $value){
                $practice->materials()->attach($value);
            }
        }
        if($request->has('tool_id')) {
            foreach($request->get('tool_id') as $key => $value){
                $practice->tools()->attach($value);
            }
        }
        if($request->has('instrument_id')) {
            foreach($request->get('instrument_id') as $key => $value){
                $practice->instruments()->attach($value);
            }
        }

        // Step 3
        if($request->has('knowledge_id')) {
            foreach($request->get('knowledge_id') as $key => $value){
                $practice->knowledge()->attach($value);
            }
        }
        if($request->has('software_behavior_id')) {
            foreach($request->get('software_behavior_id') as $key => $value){
                $practice->softwareBehaviors()->attach($value);
            }
        }
        if($request->has('hardware_behavior_id')) {
            foreach($request->get('hardware_behavior_id') as $key => $value){
                $practice->hardwareBehaviors()->attach($value);
            }
        }

        // Step 4
        if($request->has('objective_id')) {
            foreach($request->get('objective_id') as $key => $value){
                $practice->objectives()->attach($value);
            }
        }
        // Get solutions
        if($request->has('solutions_id')) { 
            $solutions = explode(",",$request->solutions_id);
            if($request->has('activitie_id')) { 
                foreach($request->get('activitie_id') as $key => $value){
                    $practice->activities()->attach($value);
                    // Search activitie
                    $activitie = \App\Activitie::find($value);
                    // Attach solution with activitie
                    $activitie->solutions()->attach($solutions[$key]);
                }
            }
        }

        
        
        // Step 5
        if($request->has('sensor_id')) { 
            foreach($request->get('sensor_id') as $key => $value){
                $practice->sensors()->attach($value,['status' => true]);
            }
        }
        if($request->has('sedam_fail_id')) { 
            foreach($request->get('sedam_fail_id') as $key => $value){
                $practice->sedamFails()->attach($value);
            }
        }
        if($request->has('moxa_fail_id')) { 
            foreach($request->get('moxa_fail_id') as $key => $value){
                $practice->moxaFails()->attach($value);
            }
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_practice');

        return redirect('/practice')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        $practice = Practice::find($practice->id);
        return response()->json($practice->sensors);

        //foreach ($practice->sensors as $sensor) {
            //obteniendo los datos de un menu específico
            //echo $sensor->name;
            //echo $sensor->description;
            //obteniendo datos de la tabla pivot por menu
            //echo $menu->pivot->task_id;
            //echo $menu->pivot->status;
        //}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        $practice = Practice::find($practice->id);
        if($practice->materials){
            foreach ($practice->materials as $material) {
                $practice->materials()->detach($material->id);
            }
        }
        if($practice->tools){
            foreach ($practice->tools as $tool) {
                $practice->tools()->detach($tool->id);
            }
        }
        if($practice->instruments){
            foreach ($practice->instruments as $instrument) {
                $practice->instruments()->detach($instrument->id);
            }
        }
        if($practice->knowledge){
            foreach ($practice->knowledge as $knowledge_) {
                $practice->knowledge()->detach($knowledge_->id);
            }
        }
        if($practice->objectives){
            foreach ($practice->objectives as $objective) {
                $practice->objectives()->detach($objective->id);
            }
        }
        if($practice->activities){
            foreach ($practice->activities as $activitie) {
                $practice->activities()->detach($activitie->id);
            }
        }
        if($practice->hardwareBehaviors){
            foreach ($practice->hardwareBehaviors as $hardwareBehavior) {
                $practice->hardwareBehaviors()->detach($hardwareBehavior->id);
            }
        }
        if($practice->softwareBehaviors){
            foreach ($practice->softwareBehaviors as $softwareBehavior) {
                $practice->softwareBehaviors()->detach($softwareBehavior->id);
            }
        }
        if($practice->sensors){
            foreach ($practice->sensors as $sensor) {
                $practice->sensors()->detach($sensor->id);
            }
        }
        if($practice->sedamFails){
            foreach ($practice->sedamFails as $sedamFail) {
                $practice->sedamFails()->detach($sedamFails->id);
            }
        }
        if($practice->moxaFails){
            foreach ($practice->moxaFails as $moxaFail) {
                $practice->moxaFails()->detach($moxaFail->id);
            }
        }
        
        $practice->delete();

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_practice');

        return redirect('/practice')->with('message',$message);
    }
}
