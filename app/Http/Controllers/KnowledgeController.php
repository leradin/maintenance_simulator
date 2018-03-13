<?php

namespace App\Http\Controllers;

use App\Knowledge;
use Illuminate\Http\Request;
use Lang;

class KnowledgeController extends Controller
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
        $knowledges = Knowledge::all();
        return view('catalog.knowledge.index',['knowledges' => $knowledges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('catalog.knowledge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $knowledge = Knowledge::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($knowledge);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_knowledge');
        return redirect('/knowledge')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        return view('catalog.knowledge.edit',['knowledge' => $knowledge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        $knowledge->fill($request->except(['_token']));
        $knowledge->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_knowledge');
        return redirect('/knowledge')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_knowledge');
        return redirect('/knowledge')->with('message',$message);
    }
}
