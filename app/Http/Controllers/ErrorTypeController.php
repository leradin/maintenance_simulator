<?php

namespace App\Http\Controllers;

use App\ErrorType;
use Illuminate\Http\Request;
use Lang;

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
        $errorTypes = ErrorType::all();
        return view('catalog.errorType.index',['errorTypes' => $errorTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.errorType.create');
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
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_error_type');
        return redirect('/error_type')->with('message',$message);
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
        return view('catalog.errorType.edit',['errorType' => $errorType]);
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
        $errorType->fill($request->except(['_token']));
        $errorType->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_error_type');
        return redirect('/error_type')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ErrorType  $errorType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorType $errorType)
    {
        try{
            $errorType->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_error_type');
            return redirect('/error_type')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_error_type');
            return redirect('/error_type')->with('message',$message);
            
        }

    }
}
