<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role'); //User can have many Roles
    }

    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name', $roles)->first()){ //Eloquent; checks if user has any roles
            return true;
        }
        else{
            return false;
        }
    }
    public function hasRole($roles){
        if($this->roles()->where('name', $roles)->first()){ //Eloquent; checks if user has any roles
            return true;
        }
        else{
            return false;
        }
    }
}
