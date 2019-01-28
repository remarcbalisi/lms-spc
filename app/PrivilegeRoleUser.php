<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivilegeRoleUser extends Model
{
    protected $table = 'privilege_role_user';

    protected $fillable = [
        'role_user_id', 'privilege_id'
    ];

    public function role_user(){
        return $this->belongsTo('App\RoleUser', 'role_user_id');
    }

    public function privilege(){
        return $this->belongsTo('App\Privilege', 'privilege_id');
    }

}
