<?php

namespace App\Http\Controllers;

use App\SedamFail;
use Illuminate\Http\Request;

class SedamFailController extends Controller
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
        $sedamFail = SedamFail::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($sedamFail);
        }
        return $sedamFail;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SedamFail  $sedamFail
     * @return \Illuminate\Http\Response
     */
    public function show(SedamFail $sedamFail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SedamFail  $sedamFail
     * @return \Illuminate\Http\Response
     */
    public function edit(SedamFail $sedamFail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SedamFail  $sedamFail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SedamFail $sedamFail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SedamFail  $sedamFail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SedamFail $sedamFail)
    {
        //
    }
}
