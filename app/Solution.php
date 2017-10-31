<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solutions';

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
    protected $fillable = ['name'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function activities(){
        return $this->belongsToMany('\App\Activitie','activitie_solution_pivot')
            ->withPivot('solution_id');
    }
}
