<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommandesModel extends Model
{
    protected $table = 'commande_table';
    protected $fillable = [
        'id',
    ];
    public $timestamps = false;

    public function confitures(){
        return $this->belongsToMany(ConfituresModel::class, 'commande_has_confiture', 'id_commande', 'id_confiture');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'commande_has_confiture', 'id_commande', 'id_user');
    }
}
