<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Request;
use Lang;

class ToolController extends Controller
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
        $tools = Tool::all();
        return view('catalog.tool.index',['tools' => $tools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.tool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tool = Tool::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($tool);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_tool');
        return redirect('/tool')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        return view('catalog.tool.edit',['tool' => $tool]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        $tool->fill($request->except(['_token']));
        $tool->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_tool');
        return redirect('/tool')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_tool');
        return redirect('/tool')->with('message',$message);
    }
}
