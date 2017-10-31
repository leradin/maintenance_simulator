<?php

namespace App\Http\Controllers;

use App\SoftwareBehavior;
use Illuminate\Http\Request;

class SoftwareBehaviorController extends Controller
{
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
        $softwareBehavior = SoftwareBehavior::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($softwareBehavior);
        }
        return $softwareBehavior;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftwareBehavior  $softwareBehavior
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoftwareBehavior $softwareBehavior)
    {
        //
    }
}
