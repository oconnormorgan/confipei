<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    protected $table = 'role_table';
    protected $fillable = [
        'intitule',
    ];
    public $timestamps = false;

    use SoftDeletes;
}
