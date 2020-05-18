<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfituresModel extends Model
{
    protected $table = 'confiture_table';
    protected $fillable = [
        'id', 'intitule', 'prix', 'id_producteur', 'fruits', 'document'
    ];
    public $timestamps = false;

    public function producteur(){
        return $this->belongsTo(ProducteursModel::class, 'id_producteur'); 
    }

    public function recompenses(){
        return $this->belongsToMany(RecompensesModel::class, 'confiture_has_recompense', 'id_confiture', 'id_recompense');
    }

    public function fruits(){
        return $this->belongsToMany(FruitsModel::class, 'confiture_has_fruit', 'id_confiture', 'id_fruit');
    }

    public function commandes(){
        return $this->belongsToMany(CommandesModel::class, 'commande_has_confiture', 'id_confiture', 'id_commande');
    }
}
