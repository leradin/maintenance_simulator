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
    protected $fillable = ['name','date_time','duration','error_type','unit_type_id'];

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
}
