<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unit_types';

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
    protected $fillable = ['name','abbreviation','command'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function practice(){
        return $this->belongsTo('\App\Practice');
    }

    public function ipAddress()
    {
        return $this->hasOne('\App\IpAddress','unit_type_id','id');
    }

    //public function stage(){
    //    return $this->belongsTo('\App\Stage');
    //}

}
