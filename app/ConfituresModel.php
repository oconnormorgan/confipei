<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfituresModel extends Model
{
    protected $table = 'confiture_table';
    protected $fillable = [
        'intitule', 'prix', 'id_producteur',
    ];
    public $timestamps = false;

    use SoftDeletes;
}
