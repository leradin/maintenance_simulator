<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Response;

class UserController extends Controller
{
	public $successStatus = 200;

    /*public function __construct(){
        $this->content = array();
    }
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $this->content['token'] = $user->createToken('Pizza App')->accessToken;
        $status = 200;
    }
    else{
        $this->content['error'] = "Unauthorised";
         $status = 401;
    }
     return response()->json($this->content, $status);    
    }
    public function details(){
        return response()->json(['user' => User::all()]);
    }
    public function login(){
        if(Auth::attempt(['enrollment' => request('enrollment'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
        }else{
            return response()->json(['error'=>'Unauthorised'], 401, array('Access-Control-Allow-Origin' => '*'));
        }
    }*/
    public function login(){
        if(Auth::attempt(['enrollment' => request('enrollment'), 'password' => request('password')])){
            $user = Auth::user(['enrollment' => request('enrollment'), 'password' => request('password')]);
            $success['token'] =  $user->createToken('Laravel')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this->successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details(){
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus,array('Access-Control-Allow-Origin' => '*'));
    }

    public function index(){
        return User::all();
    }
}
