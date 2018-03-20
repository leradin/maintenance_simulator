<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exercises';

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
    protected $fillable = ['name','description','status'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function stages(){
        return $this->belongsToMany('\App\Stage','exercise_stage_pivot')
            ->withPivot('id','exercise_id','stage_id','user_id','date_time','structure','table_id');
    }

    // New
    public function users(){
        return $this->belongsToMany('\App\User','exercise_stage_pivot')
            ->withPivot('id','exercise_id','stage_id','user_id','date_time','structure','table_id');
    }

    public function setDescriptionAttribute($value)
    {
        if(empty($this->attributes['description'])){
            $this->attributes['description'] = "Sin descripción";
        }
    }
    
}
