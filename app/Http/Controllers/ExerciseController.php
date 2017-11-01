<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use Lang;

class ExerciseController extends Controller
{
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
        $students =  \App\Student::all();
        return view('exercise.create',['stages' => $stages,
                                       'students' => $students]);
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
            'description' => $request->description
        ]);
        
        if($request->has('stages_id')) {
            foreach($request->get('stages_id') as $key => $value){
                $exercise->stages()->attach($value,['date_time'=>$request->date_time,'structure'=>'{}']);
                $stage = \App\Stage::find($value);
                $stage->students()->attach($request->get('students_id')[$key]);
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
        //return response()->json($exercise->toArray());
        foreach ($exercise->stages as $stage) {
            //obteniendo los datos de un task específico
            //echo $stage->name;
            //obteniendo datos de la tabla pivot por task
            //echo ;
            //return response()->json($stage->pivot->structure);
            $json  = json_decode($stage->pivot->structure, JSON_PRETTY_PRINT);
            //$url = route('fire');
            event(new \App\Events\EventName($json));
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
}
