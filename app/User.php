<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'names','lastnames' ,'enrollment', 'password','degree_id','ascription_id','user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function stages(){
        return $this->belongsToMany('\App\Stage','stage_student_pivot')
            ->withPivot('stage_id');
    }

    public function degree(){
        return $this->hasOne('App\Degree', 'id', 'degree_id');
    }

    public function ascription(){
        return $this->hasOne('App\Ascription', 'id', 'ascription_id');
    }
}
