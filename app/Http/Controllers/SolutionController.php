<?php

namespace App\Http\Controllers;

use App\Solution;
use Illuminate\Http\Request;
use Lang;

class SolutionController extends Controller
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
        $solutions = Solution::all();
        if($request->ajax()){
            return \Response::json($solutions);
        }
        return view('catalog.solution.index',['solutions' => $solutions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.solution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solution = Solution::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($solution);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_solution');
        return redirect('/solution')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        return view('catalog.solution.edit',['solution' => $solution]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solution $solution)
    {
        $solution->fill($request->except(['_token']));
        $solution->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_solution');
        return redirect('/solution')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        $solution->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_solution');
        return redirect('/solution')->with('message',$message);
    }
}
