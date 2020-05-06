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

    public function confiture(){
        return $this->belongsToMany(ConfituresModel::class, 'confiture_has_fruit', 'id_fruit', 'id_confiture');
    }
}
