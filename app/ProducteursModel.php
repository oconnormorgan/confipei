<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducteursModel extends Model
{
    protected $table = 'producteur_table';
    protected $fillable = [
        'nom', 'id_user',
    ];
    public $timestamps = false;

    public function producteur(){
        return $this->hasMany(ConfituresModel::class, 'id_producteur');
    }

    public function user(){
        return $this->belongsTo(UsersModel::class, 'id_user');
    }
}
