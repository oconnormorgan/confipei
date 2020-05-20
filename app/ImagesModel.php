<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{
    protected $table = 'image_confiture';
    protected $fillable = [
        'id', 'image'
    ];
    public $timestamps = false;

    public function confiture(){
        return $this->hasMany(ConfituresModel::class, 'id_image');
    }
}
