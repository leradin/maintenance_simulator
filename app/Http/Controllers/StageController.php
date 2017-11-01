<?php

namespace App\Http\Controllers;

use App\Stage;
use Illuminate\Http\Request;
use Lang;

class StageController extends Controller
{
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
        return view('stage.create',['practices' => $practices]);
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
        //
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
        $stage = Stage::find($stage->id);
        if($stage->practices){
            foreach ($stage->practices as $practice) {
                $stage->practices()->detach($practice->id);
            }
        }
        
        $stage->delete();

        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_stage');

        return redirect('/stage')->with('message',$message);    }
}
