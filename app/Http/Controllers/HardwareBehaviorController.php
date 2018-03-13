<?php

namespace App\Http\Controllers;

use App\HardwareBehavior;
use Illuminate\Http\Request;
use Lang;

class HardwareBehaviorController extends Controller
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
        $hardwareBehaviors = HardwareBehavior::all();
        return view('catalog.hardwareBehavior.index',['hardwareBehaviors' => $hardwareBehaviors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('catalog.hardwareBehavior.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hardwareBehavior = HardwareBehavior::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($hardwareBehavior);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_hardware_behavior');
        return redirect('/hardware_behavior')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HardwareBehavior  $hardwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function show(HardwareBehavior $hardwareBehavior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HardwareBehavior  $hardwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function edit(HardwareBehavior $hardwareBehavior)
    {
        return view('catalog.hardwareBehavior.edit',['hardwareBehavior' => $hardwareBehavior]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HardwareBehavior  $hardwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HardwareBehavior $hardwareBehavior)
    {
        $hardwareBehavior->fill($request->except(['_token']));
        $hardwareBehavior->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_hardware_behavior');
        return redirect('/hardware_behavior')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HardwareBehavior  $hardwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function destroy(HardwareBehavior $hardwareBehavior)
    {
        $hardwareBehavior->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_hardware_behavior');
        return redirect('/hardware_behavior')->with('message',$message);
    }
}
