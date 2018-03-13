<?php

namespace App\Http\Controllers;

use App\Ascription;
use Illuminate\Http\Request;
use Lang;

class AscriptionController extends Controller
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
        $ascriptions = Ascription::all();
        return view('catalog.ascription.index',['ascriptions' => $ascriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.ascription.create');
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
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_ascription');
        return redirect('/ascription')->with('message',$message);
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
        return view('catalog.ascription.edit',['ascription' => $ascription]);
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
        $ascription->fill($request->except(['_token']));
        $ascription->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_ascription');
        return redirect('/ascription')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ascription  $ascription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ascription $ascription)
    {
        try{
            $ascription->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_ascription');
            return redirect('/ascription')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_ascription');
            return redirect('/ascription')->with('message',$message);
        }
    }
}
