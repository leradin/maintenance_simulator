<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Lang;

class StudentController extends Controller
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
        $students = Student::all();
        return view('student.index',['students' => $students]);
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

        return view('student.create',['degrees' => $degrees,'ascriptions' => $ascriptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $student = Student::create($request->except('_token'));
            return redirect('student')->with('status', 'Profile updated!');
        }catch(\Exception $e){            
            $message['type'] = 'error';
            $message['status'] = Lang::get('messages.error_enrollment_duplicate');
            return back()->withInput()->with('message', $message);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function search($enrollment){
        //return $enrollment;
        //$student = Student::where('enrollment', $enrollment)->first();
            $arrayToJs = array();
            $arrayToJs[0] = "enrollment";
            $arrayToJs[1] = false;
        //if($student){
            return \Response::json($arrayToJs);
        //}
        //return \Response::json($arrayToJs);
    }
}
