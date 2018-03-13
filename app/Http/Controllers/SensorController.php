<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;
use Lang;

class SensorController extends Controller
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
        $sensors = Sensor::all();
        return view('catalog.sensor.index',['sensors' => $sensors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.sensor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sensor = Sensor::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($sensor);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sensor');
        return redirect('/sensor')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        return view('catalog.sensor.edit',['sensor' => $sensor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
        $sensor->fill($request->except(['_token']));
        $sensor->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sensor');
        return redirect('/sensor')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sensor $sensor)
    {
        $sensor->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_sensor');
        return redirect('/sensor')->with('message',$message);
    }
}
