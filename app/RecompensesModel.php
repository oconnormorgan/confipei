<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecompensesModel extends Model
{
    protected $table = 'recompense_table';
    protected $fillable = [
        'nom', 'annee',
    ];
    public $timestamps = false;

    use SoftDeletes;
}
