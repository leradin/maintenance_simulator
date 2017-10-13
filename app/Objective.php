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
    protected $fillable = ['name','description','prority'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
