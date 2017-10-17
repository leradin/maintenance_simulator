<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ascription extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ascriptions';

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

    public function student(){
        return $this->belongsTo('\App\Student');
    }
}
