<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zonegroup extends Model
{
    protected $fillable = [
    	'id_zg', 'city_it', 'zone_group', 'id_city', 'slug', 'geometry',
    ];


    protected $table = 'zones_group';
    protected $primaryKey = 'id_zg';
    public $timestamps = false;

}