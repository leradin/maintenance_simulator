<?php

namespace App\Http\Controllers;

use App\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
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
        $unitType = UnitType::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($unitType);
        }
        return $unitType;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function show(UnitType $unitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitType $unitType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitType $unitType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitType  $unitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitType $unitType)
    {
        //
    }
}
