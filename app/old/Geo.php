<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    protected $fillable = [
    	'id', 'id_original', 'value', 'slug', 'latitude', 'longitude', 'main_town', 'geobox', 'type', 'refer',
    ];


    protected $table = 'geo';
    public $timestamps = false;

}