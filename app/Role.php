<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = [
        'name', 'slug'
    ];

    public function role_users(){
        return $this->hasMany("App\RoleUser", "role_id", "id");
    }
}
