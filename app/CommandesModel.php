<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommandesModel extends Model
{
    protected $table = 'commande_table';
    protected $fillable = [
        'id'
    ];
    public $timestamps = false;

    use SoftDeletes;
}
