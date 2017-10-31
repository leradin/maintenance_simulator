<?php

namespace App\Http\Controllers;

use App\Ascription;
use Illuminate\Http\Request;

class AscriptionController extends Controller
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
        $ascription = Ascription::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($ascription);
        }
        return $ascription;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ascription  $ascription
     * @return \Illuminate\Http\Response
     */
    public function show(Ascription $ascription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ascription  $ascription
     * @return \Illuminate\Http\Response
     */
    public function edit(Ascription $ascription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ascription  $ascription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ascription $ascription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ascription  $ascription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ascription $ascription)
    {
        //
    }
}
