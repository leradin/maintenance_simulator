<?php

namespace App\Http\Controllers;

use App\HardwareBehavior;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return $hardwareBehavior;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HardwareBehavior  $hardwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function destroy(HardwareBehavior $hardwareBehavior)
    {
        //
    }
}
