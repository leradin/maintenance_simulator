<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'practices';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','duration','error_type_id','unit_type_id'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function students(){
        return $this->belongsToMany('\App\Student','practice_student_pivot')
            ->withPivot('student_id');
    }

    public function materials(){
        return $this->belongsToMany('\App\Material','practice_material_pivot')
            ->withPivot('material_id');
    }

    public function tools(){
        return $this->belongsToMany('\App\Tool','practice_tool_pivot')
            ->withPivot('tool_id');
    }

    public function instruments(){
        return $this->belongsToMany('\App\Instrument','practice_instrument_pivot')
            ->withPivot('instrument_id');
    }

    public function knowledge(){
        return $this->belongsToMany('\App\Knowledge','practice_knowledge_pivot')
            ->withPivot('knowledge_id');
    }

    public function objectives(){
        return $this->belongsToMany('\App\Objective','practice_objective_pivot')
            ->withPivot('objective_id');
    }

    public function activities(){
        return $this->belongsToMany('\App\Activitie','practice_activitie_pivot')
        ->withPivot('activitie_id');
    }

    public function hardwareBehaviors(){
        return $this->belongsToMany('\App\HardwareBehavior','practice_hardware_behavior_pivot')
        ->withPivot('hardware_behavior_id');
    }

    public function softwareBehaviors(){
        return $this->belongsToMany('\App\SoftwareBehavior','practice_software_behavior_pivot')
        ->withPivot('software_behavior_id');
    }

    public function sensors(){
        return $this->belongsToMany('\App\Sensor','practice_sensor_pivot')
            ->withPivot('sensor_id');
    }

    public function sedamFails(){
        return $this->belongsToMany('\App\SedamFail','practice_sedam_fail_pivot')
            ->withPivot('sedam_fail_id');
    }

    public function moxaFails(){
        return $this->belongsToMany('\App\MoxaFail','practice_moxa_fail_pivot')
            ->withPivot('moxa_fail_id');
    }
    

    public function unitType(){
        return $this->belongsTo('\App\UnitType');
    }

    public function errorType(){
        return $this->belongsTo('\App\ErrorType');
    }
}
