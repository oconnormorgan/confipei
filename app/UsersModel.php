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

    public function role(){
        return $this->belongsTo(RoleModel::class, 'id_role');
    }

    public function commandes(){
        return $this->belongsToMany(CommandesModel::class, 'commande_has_confiture', 'id_user', 'id_commande');
    }
}
