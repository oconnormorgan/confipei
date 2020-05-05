<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProducteursModel extends Model
{
    protected $table = 'producteur_table';
    protected $fillable = [
        'nom'
    ];
    public $timestamps = false;

    use SoftDeletes;
}
