<?php

namespace App\Http\Controllers;

use App\Instrument;
use Illuminate\Http\Request;
use Lang;

class InstrumentController extends Controller
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
        $instruments = Instrument::all();
        return view('catalog.instrument.index',['instruments' => $instruments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.instrument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instrument = Instrument::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($instrument);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_instrument');
        return redirect('/instrument')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function show(Instrument $instrument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrument $instrument)
    {
        return view('catalog.instrument.edit',['instrument' => $instrument]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instrument $instrument)
    {
        $instrument->fill($request->except(['_token']));
        $instrument->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_instrument');
        return redirect('/instrument')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrument  $instrument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_instrument');
        return redirect('/instrument')->with('message',$message);
    }
}
