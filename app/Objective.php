<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'objectives';

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
        return $this->belongsToMany('\App\Practice','practice_objective_pivot')
            ->withPivot('practice_id');
    }
}
