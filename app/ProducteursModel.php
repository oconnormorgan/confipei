<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducteursModel extends Model
{
    protected $table = 'producteur_table';
    protected $fillable = [
        'nom'
    ];
    public $timestamps = false;

    public function producteur(){
        return $this->hasMany(ConfituresModel::class, 'id_producteur');
    }
}
