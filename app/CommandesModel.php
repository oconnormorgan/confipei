<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommandesModel extends Model
{
    protected $table = 'commande_table';
    protected $fillable = [
        'id', 'id_user', 'id_adresse_facturation', 'id_adresse_livraison',
    ];
    public $timestamps = false;

    public function confitures()
    {
        return $this->belongsToMany(ConfituresModel::class, 'commande_has_confiture', 'id_commande', 'id_confiture');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function adresseFacturation()
    {
        return $this->belongsTo(AdressesModel::class, 'id_adresse_facturation');
    }

    public function adresseLivraison()
    {
        return $this->belongsTo(AdressesModel::class, 'id_adresse_livraison');
    }
}
