<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'id_city', 'id_province', 'id_region', 'name', 'slug', 'istat_code_city', 'istat_code_city_numeric', 'istat_code_city_update', 'istat_code_city_numeric_update', 'main_town', 'latitude', 'longitude', 'xgeo', 'ygeo', 'zone', 'hamlet', 'zones', 'districts', 'id_city_20_km', 'id_city_20_km_today', 'id_city_5_km', 'id_city_5_km_today', 'id_city_15_km', 'id_city_5_km_no_main_town', 'id_city_10_km_no_main_town', 'geometry', 'geometry_bbox', 'geobox',
    ];


    protected $table = 'cities';
    protected $primaryKey = 'id_city';
    public $timestamps = false;

}