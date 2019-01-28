<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'mname', 'lname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role_user(){
        return $this->hasMany('App\RoleUser', 'user_id', 'id');
    }

    public function is($role_slug){
        $role_users = $this->role_user()->get();
        foreach($role_users as $ru){
            if( $ru->role->slug == $role_slug ){
                return true;
            }
        }
        return false;
    }
}
