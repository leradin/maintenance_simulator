<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stages';

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
    protected $fillable = ['name','description'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function practices(){
        return $this->belongsToMany('\App\Practice','stage_practice_pivot')
            ->withPivot('id','stage_id','practice_id');
    }

    public function users(){
        return $this->belongsToMany('\App\User','stage_user_pivot')
            ->withPivot('user_id','exercise_id')->withTimestamps();
    }

    public function exercises(){
        return $this->belongsToMany('\App\Exercise','exercise_stage_pivot')
            ->withPivot('id','exercise_id','stage_id','user_id','date_time','structure','table_id');
    }

    public function getDescriptionAttribute($value)
    {
        if(empty($value)){
            return "Sin descripción";
        }
        return $value;
        
    }

    //public function unitType(){
    //    return $this->belongsTo('App\UnitType');
    //}

}
