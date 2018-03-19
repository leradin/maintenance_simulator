<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Show the view Report.
     *
     * @return view
     */
    public function index(Request $request)
    {
        $exercises = [];
        
        if(!empty($request->start_date) && !empty($request->finish_date)){

            $exercises = Exercise::where('status',2)->whereHas('stages', function ($query) use ($request) {
                $query->where('date_time','>=',$request->start_date)->where('date_time','<=',$request->finish_date);
            })->get();

            /*foreach ($exercises as $exercise) {
                $report['exercise'][$exercise->id] = array('id' => $exercise->id,
                                            'name' => $exercise->name,
                                            'description' => $exercise->description);
                foreach ($exercise->stages()->wherePivot('exercise_id',$exercise->id)->get() as $stage) {
                    $report['exercise'][$exercise->id]
                    ['stages'][$stage->id] = array('id' => $stage->id,
                                                    'name' => $stage->name,
                                                    'description' => $stage->description);

                    $user = $stage->users()
                        ->wherePivot('exercise_id',$exercise->id)
                        ->wherePivot('stage_id',$stage->id)
                        ->first();

                    $report['exercise'][$exercise->id]
                    ['stages'][$stage->id]['student'][$user->id] = array('id' => $user->id,
                                                            'names' => $user->names,
                                                            'lastnames' => $user->lastnames,
                                                            'degree_id' => $user->degree_id,
                                                            'degree' => $user->degree->name,
                                                            'ascription_id' => $user->ascription_id,
                                                            'ascription' => $user->ascription->name,
                                                            'full_name' => $user->full_name);

                    foreach ($stage->practices()->wherePivot('stage_id',$stage->id)->get() as $practice) {
    
                        $report['exercise'][$exercise->id]
                        ['stages'][$stage->id]
                        ['practices'][$practice->id] = array('id' => $practice->id,
                                                            'name' => $practice->name,
                                                            'duration' => $practice->duration,
                                                            'error_type' => $practice->errorType->name);

                    }
                }
            }*/
        }

        if(!empty($request->exercise)){
            $exercises = Exercise::where('name','like','%'.$request->exercise.'%')->get();
        }

        if(!empty($request->student)){
            foreach (Exercise::all() as $exercise) {
                foreach ($exercise->stages as $stage) {
                    $user = $stage->users()
                    ->wherePivot('exercise_id',$exercise->id)
                    ->wherePivot('stage_id',$stage->id)
                    ->get();
                    foreach ($stage->users()
                    ->wherePivot('exercise_id',$exercise->id)
                    ->wherePivot('stage_id',$stage->id)
                    ->where('names','like','%'.$request->student.'%')
                    ->orWhere('lastnames','like','%'.$request->student.'%')->get() as $user) {
                        array_push($exercises,$exercise);
                    }
                }
            }
        }
        return view('report.index',['exercises' => $exercises]);
    }

    public function show(Request $request){
        $exercise = Exercise::find($request->exercise_id);
        $report = [];
        foreach ($exercise->stages()->wherePivot('exercise_id',$exercise->id)->get() as $stage) {
            $report['stages'][$stage->id] = array('id' => $stage->id,
                                            'name' => $stage->name,
                                            'description' => $stage->description);

            $user = $stage->users()
                ->wherePivot('exercise_id',$exercise->id)
                ->wherePivot('stage_id',$stage->id)
                ->first();



            $report['stages'][$stage->id]['student'][$user->id] = array('id' => $user->id,
                                                            'names' => $user->names,
                                                            'lastnames' => $user->lastnames,
                                                            'degree_id' => $user->degree_id,
                                                            'degree' => $user->degree->name,
                                                            'ascription_id' => $user->ascription_id,
                                                            'ascription' => $user->ascription->name,
                                                            'full_name' => $user->full_name);

            foreach ($stage->practices()->wherePivot('stage_id',$stage->id)->get() as $practice) {
                $report['stages'][$stage->id]
                ['practices'][$practice->id] = array('id' => $practice->id,
                                                    'name' => $practice->name,
                                                    'duration' => $practice->duration,
                                                    'error_type' => $practice->errorType->name);
                
                $report['stages'][$stage->id]['practices'][$practice->id]['extra'] = array('answer' => $user->practices()->get()->first()->pivot->answer,
                    'score' => $user->practices()->get()->first()->pivot->passed);
            }
        }
        return response()->json($report);
    }

    public function pdf($exerciseId){
        $exercise = Exercise::find($exerciseId);
        $report['exercise'] = array('id' => $exercise->id,
                                            'name' => $exercise->name,
                                            'description' => $exercise->description);
        $score ['approved'] = 0; 
        $score ['approved_not'] = 0;
        setlocale(LC_TIME, 'es_ES');
        Carbon::setLocale('es');
        Carbon::setUtf8(true);
                
                foreach ($exercise->stages()->wherePivot('exercise_id',$exercise->id)->get() as $stage) {
                    $report['exercise']
                    ['stages'][$stage->id] = array('id' => $stage->id,
                                                    'name' => $stage->name,
                                                    'description' => $stage->description
                                                    );
                    $dateTime = $stage->pivot->date_time;
                    $dateTime = Carbon::createFromFormat('Y-m-d h:i:s',$dateTime)->formatLocalized('%A %d %B %Y');

                    $user = $stage->users()
                        ->wherePivot('exercise_id',$exercise->id)
                        ->wherePivot('stage_id',$stage->id)
                        ->first();

                    $report['exercise']
                    ['stages'][$stage->id]['student'] = array('id' => $user->id,
                                                            'names' => $user->names,
                                                            'lastnames' => $user->lastnames,
                                                            'degree_id' => $user->degree_id,
                                                            'degree' => $user->degree->name,
                                                            'ascription_id' => $user->ascription_id,
                                                            'ascription' => $user->ascription->name,
                                                            'full_name' => $user->full_name);
                    $student = $report['exercise']
                    ['stages'][$stage->id]['student'];

                    foreach ($stage->practices()->wherePivot('stage_id',$stage->id)->get() as $practice) {
    
                        $report['exercise']
                        ['stages'][$stage->id]
                        ['practices'][$practice->id] = array('id' => $practice->id,
                                                            'name' => $practice->name,
                                                            'duration' => $practice->duration,
                                                            'error_type' => $practice->errorType->name,
                                                            'answer' => $user->practices()->get()->first()->pivot->answer,
                    'score' => $user->practices()->get()->first()->pivot->passed
                );
                        if($user->practices()->get()->first()->pivot->passed){
                            $score ['approved'] += 1;  
                        }else{
                            $score ['approved_not'] += 1;  
                        }
                        


                    }
                }
        $pdf = PDF::setOptions([
            'images' => true,
            'defaultFont', 'Courier'
        ])->loadView('report.pdf',compact('report','student','score','dateTime'));
        return $pdf->download($exercise->id.'_'.$exercise->name.'.pdf');
    }
}