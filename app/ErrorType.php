<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'error_types';

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
    protected $fillable = ['name','abbreviation'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    public function practice(){
        return $this->belongsTo('\App\Practice');
    }
}
