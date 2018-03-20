<?php

namespace App\Http\Controllers;

use App\MoxaFail;
use Illuminate\Http\Request;
use Lang;

class MoxaFailController extends Controller
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
        $moxaFails = MoxaFail::all();
        return view('catalog.moxaFail.index',['moxaFails' => $moxaFails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.moxaFail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moxaFail = MoxaFail::create($request->except('_token'));
        if($request->ajax()){
            return \Response::json($moxaFail);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_moxa_fail');
        return redirect('/moxa_fail')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoxaFail  $moxaFail
     * @return \Illuminate\Http\Response
     */
    public function show(MoxaFail $moxaFail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoxaFail  $moxaFail
     * @return \Illuminate\Http\Response
     */
    public function edit(MoxaFail $moxaFail)
    {
        return view('catalog.moxaFail.edit',['moxaFail' => $moxaFail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoxaFail  $moxaFail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoxaFail $moxaFail)
    {
        $moxaFail->fill($request->except(['_token']));
        $moxaFail->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_moxa_fail');
        return redirect('/moxa_fail')->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoxaFail  $moxaFail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoxaFail $moxaFail)
    {
        try{
            $moxaFail->delete();
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.remove_moxa_fail');
            return redirect('/moxa_fail')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_delete_moxa_fail');
            return redirect('/moxa_fail')->with('message',$message);
        }
    }
}
