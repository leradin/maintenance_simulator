<?php

namespace App\Http\Controllers;

use App\SoftwareBehavior;
use Illuminate\Http\Request;
use Lang;

class SoftwareBehaviorController extends Controller
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
        $softwareBehaviors = SoftwareBehavior::all();
        return view('catalog.softwareBehavior.index',['softwareBehaviors' => $softwareBehaviors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('catalog.softwareBehavior.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $softwareBehavior = SoftwareBehavior::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($softwareBehavior);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_software_behavior');
        return redirect('/software_behavior')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftwareBehavior  $softwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function show(SoftwareBehavior $softwareBehavior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoftwareBehavior  $softwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function edit(SoftwareBehavior $softwareBehavior)
    {
        return view('catalog.softwareBehavior.edit',['softwareBehavior' => $softwareBehavior]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftwareBehavior  $softwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoftwareBehavior $softwareBehavior)
    {
        $softwareBehavior->fill($request->except(['_token']));
        $softwareBehavior->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_software_behavior');
        return redirect('/software_behavior')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftwareBehavior  $softwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftwareBehavior $softwareBehavior)
    {
        try{
            $softwareBehavior->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_software_behavior');
            return redirect('/software_behavior')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_behaviors_software');
            return redirect('/software_behavior')->with('message',$message);
        }
    }
}
