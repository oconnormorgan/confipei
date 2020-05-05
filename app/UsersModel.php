<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersModel extends Model
{
    protected $table = 'users_table';
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'id_role'
    ];
    public $timestamps = false;

    use SoftDeletes;
}
