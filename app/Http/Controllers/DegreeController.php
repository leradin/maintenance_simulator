<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;
use Lang;

class DegreeController extends Controller
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
    public function index(){
        $degrees = Degree::all();
        return view('catalog.degree.index',['degrees' => $degrees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.degree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $degree = Degree::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($degree);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_degree');
        return redirect('/degree')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit(Degree $degree)
    {
        return view('catalog.degree.edit',['degree' => $degree]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Degree $degree)
    {
        $degree->fill($request->except(['_token']));
        $degree->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_degree');
        return redirect('/degree')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Degree $degree)
    {
        $degree->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_degree');
        return redirect('/degree')->with('message',$message);
    }
}
