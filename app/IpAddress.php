<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ip_addresses';

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
    protected $fillable = ['ip','unit_type_id'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function unitType(){
        return $this->belongsTo('\App\IpAddress');
    }
}
