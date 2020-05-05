<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FruitsModel extends Model
{
    protected $table = 'fruit_table';
    protected $fillable = [
        'nom'
    ];
    public $timestamps = false;

    use SoftDeletes;
}
