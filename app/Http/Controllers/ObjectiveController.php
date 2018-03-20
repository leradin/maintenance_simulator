<?php

namespace App\Http\Controllers;

use App\Objective;
use Illuminate\Http\Request;
use Lang;

class ObjectiveController extends Controller
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
        $objectives = Objective::all();
        return view('catalog.objective.index',['objectives' => $objectives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.objective.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objective = Objective::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($objective);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_objective');
        return redirect('/objective')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Objective $objective)
    {
        return view('catalog.objective.edit',['objective' => $objective]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        $objective->fill($request->except(['_token']));
        $objective->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_objective');
        return redirect('/objective')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        try{
            $objective->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_objective');
            return redirect('/objective')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_objective');
            return redirect('/objective')->with('message',$message);
        }
    }
}
