<?php

namespace App\Http\Controllers;

use App\ErrorType;
use Illuminate\Http\Request;

class ErrorTypeController extends Controller
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
        $errorType = ErrorType::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($errorType);
        }
        return $errorType;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ErrorType  $errorType
     * @return \Illuminate\Http\Response
     */
    public function show(ErrorType $errorType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ErrorType  $errorType
     * @return \Illuminate\Http\Response
     */
    public function edit(ErrorType $errorType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ErrorType  $errorType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorType $errorType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ErrorType  $errorType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorType $errorType)
    {
        //
    }
}
