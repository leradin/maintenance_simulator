<?php

namespace App\Http\Controllers;

use App\SedamFail;
use Illuminate\Http\Request;
use Lang;

class SedamFailController extends Controller
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
        $sedamFails = SedamFail::all();
        return view('catalog.SedamFail.index',['sedamFails' => $sedamFails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.sedamFail.create');
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
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sedam_fail');
        return redirect('/sedam_fail')->with('message',$message);
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
        return view('catalog.sedamFail.edit',['sedamFail' => $sedamFail]);
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
        $sedamFail->fill($request->except(['_token']));
        $sedamFail->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_sedam_fail');
        return redirect('/sedam_fail')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SedamFail  $sedamFail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SedamFail $sedamFail)
    {
        $sedamFail->delete();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_sedam_fail');
        return redirect('/sedam_fail')->with('message',$message);
    }
}
