<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    protected $table = 'role_users_table';
    protected $fillable = [
        'intitule',
    ];
    public $timestamps = false;

    public function role(){
        return $this->hasMany(UsersModel::class, 'id_role');
    }
}
