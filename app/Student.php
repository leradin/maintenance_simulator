<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

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
    protected $fillable = ['enrollment','names','lastnames','degree_id','ascription_id'];

    public function practices(){
        return $this->belongsToMany('\App\Practice','practice_student_pivot')
            ->withPivot('practice_id');
    }

    public function degree(){
        return $this->hasOne('\App\Degree');
    }

    public function ascription(){
        return $this->hasOne('\App\Ascription');
    }
}
