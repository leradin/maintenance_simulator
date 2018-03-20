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
        $users = User::orderBy('created_at', 'desc')->get();
        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('user.create',['degrees' => $this->getDegreesCompact(),'ascriptions' => $this->getAscriptionsCompact()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
    public function edit(User $user){
        return view('user.edit',['degrees' => $this->getDegreesCompact(),'ascriptions' => $this->getAscriptionsCompact(),'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){
        $user->fill($request->except(['_token','confirm_password']));
        $user->save();
        $message['type'] = 'success';
        $message['status'] = Lang::get('messages.success_user');
        return redirect('/user')->with('message',$message);
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

    private function getDegreesCompact(){
        $degrees = \App\Degree::get()->pluck('name_abbreviation','id');
        return $degrees;
    }

    private function getAscriptionsCompact(){
        $ascriptions = \App\Ascription::get()->pluck('name_abbreviation','id');
        return $ascriptions;
    }
}
