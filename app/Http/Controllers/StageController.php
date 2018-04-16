<?php

namespace App\Http\Controllers;

use App\Stage;
use Illuminate\Http\Request;
use Lang;

class StageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stage.index',['stages' => $stages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $practices = \App\Practice::all();
        $unitTypes =  \App\UnitType::all();
        return view('stage.create',['practices' => $practices,
                                    'unitTypes' => $unitTypes]);
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
        $stage = Stage::create([
            'name' =>  $request->name,
            'description' => $request->description,
            'table_id' => $request->unit_type_id
        ]);

        if($request->has('practices_id')) {
            foreach($request->get('practices_id') as $key => $value){
                $stage->practices()->attach($value);
            }
        }

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_stage');

        return redirect('/stage')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        $stage = Stage::find($stage->id);
        foreach ($stage->practices as $practice) {
            $practice->unitType;
            $practice->errorType;
            if($practice->materials){
                foreach ($practice->materials as $material) {
                }
            }
            if($practice->tools){
                foreach ($practice->tools as $tool) {
                }
            }
            if($practice->instruments){
                foreach ($practice->instruments as $instrument) {
                }
            }
            if($practice->knowledge){
                foreach ($practice->knowledge as $knowledge_) {
                }
            }
            if($practice->objectives){
                foreach ($practice->objectives as $objective) {
                }
            }
            if($practice->activities){
                foreach ($practice->activities as $activitie) {
                }
            }
            if($practice->hardwareBehaviors){
                foreach ($practice->hardwareBehaviors as $hardwareBehavior) {
                }
            }
            if($practice->softwareBehaviors){
                foreach ($practice->softwareBehaviors as $softwareBehavior) {
                }
            }
            if($practice->sensors){
                foreach ($practice->sensors as $sensor) {
                }
            }
            if($practice->sedamFails){
                foreach ($practice->sedamFails as $sedamFail) {
                }
            }

            if($practice->moxaFails){
                foreach ($practice->moxaFails as $moxaFail) {
                }
            }
        }
        return \Response::json($stage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        try{

            $stage = Stage::find($stage->id);
            if($stage->practices){
                foreach ($stage->practices as $practice) {
                    $stage->practices()->detach($practice->id);
                }
            }
            
            $stage->delete();
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_stage');
            return redirect('/stage')->with('message',$message);
        }

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_stage');

        return redirect('/stage')->with('message',$message);    }
}
