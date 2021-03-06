<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'degrees';

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

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function getNameAbbreviationAttribute()
    {
        return $this->name . ' - ' . $this->abbreviation;
    }
}
