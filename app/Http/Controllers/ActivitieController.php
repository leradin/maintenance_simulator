<?php

namespace App\Http\Controllers;

use App\Activitie;
use Illuminate\Http\Request;
use Lang;

class ActivitieController extends Controller
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
    public function index(Request $request)
    {
        $activities = Activitie::all();
        if($request->ajax()){
            return \Response::json($activities);
        }
        return view('catalog.activitie.index',['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.activitie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activitie = Activitie::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($activitie);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_activitie');
        return redirect('/activitie')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function show(Activitie $activitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Activitie $activitie)
    {
        return view('catalog.activitie.edit',['activitie' => $activitie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activitie $activitie)
    {
        $activitie->fill($request->except(['_token']));
        $activitie->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_activitie');
        return redirect('/activitie')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activitie $activitie)
    {
        $activitie->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_activitie');
        return redirect('/activitie')->with('message',$message);
    }
}
