<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'role_users_table';
    protected $fillable = [
        'intitule'
    ];
    public $timestamps = false;

    function user(){
        return $this->hasMany(UsersModel::class, 'id_role');
    }
}
