<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photogallery extends Model
{

    protected $fillable = [
        'id_photogallery', 'id_event', 'url',
    ];

    protected $table = 'photogallery';
    protected $primaryKey = 'id_photogallery';
    public $timestamps = false;

}
