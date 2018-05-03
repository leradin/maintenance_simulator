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
        'names','lastnames' ,'enrollment', 'password','degree_id','ascription_id','user','session_id'
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

    public function getFullNameAttribute(){
        return "{$this->degree->name} {$this->names} {$this->lastnames}  ({$this->ascription->name})";
    }


    public function practices(){
        return $this->belongsToMany('\App\Practice','practice_user_pivot')
            ->withPivot('id','practice_id','user_id','answer','passed','exercise_id','evaluator_user_id')->withTimestamps();
    }

    public function stages(){
        return $this->belongsToMany('\App\Stage','stage_user_pivot')
            ->withPivot('stage_id','exercise_id');
    }

    public function degree(){
        return $this->hasOne('App\Degree', 'id', 'degree_id');
    }

    public function ascription(){
        return $this->hasOne('App\Ascription', 'id', 'ascription_id');
    }

    public function exercises(){
        return $this->belongsToMany('\App\Exercise','exercise_stage_pivot')
            ->withPivot('id','exercise_id','stage_id','practice_id','user_id','date_time','structure','table_id');
    }
    public function findForPassport($enrollment){
	return $this->where('enrollment',$enrollment)->first();
    }
}
