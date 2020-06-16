<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdressesModel extends Model
{
    protected $table = 'adresse_table';
    protected $fillable = [
        'id', 'numero', 'adresse', 'code_postal', 'ville', 'pays', 'id_user'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function adresseFacturation()
    {
        return $this->hasMany(CommandesModel::class, 'id_adresse_facturation');
    }
    public function adresseLivraison()
    {
        return $this->hasMany(CommandesModel::class, 'id_adresse_livraison');
    }
}
