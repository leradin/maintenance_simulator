<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Lang;

class UserController extends Controller
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
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degrees = \App\Degree::all();
        $ascriptions = \App\Ascription::all();
        return view('user.create',['degrees' => $degrees,'ascriptions' => $ascriptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try{
            $user = User::create($request->except(['_token','confirm_password']));
            
            $message['type'] = 'success';
            $message['status'] = Lang::get('messages.success_user');

            return redirect('/user')->with('message',$message);
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_duplicate_enrollment_in_user');
            return back()->withInput()
                                  ->with('message',$message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            $user = User::find($user->id);
            $user->delete();
        }catch(\Exception $e){
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_user');
            return redirect('/user')->with('message',$message);
        }
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.remove_user');
        return redirect('/user')->with('message',$message);
    }
}
