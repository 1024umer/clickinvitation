<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
    	'id_zone', 'zone', 'slug', 'istat_code', 'id_city', 'city_it', 'id_zone_group',
    ];


    protected $table = 'zones';
    protected $primaryKey = 'id_zone';
    public $timestamps = false;

}