<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
    	'id_region', 'name', 'slug', 'code_region', 'region_local_name', 'latitude', 'longitude', 'id_retro',
    ];


    protected $table = 'regions';
    protected $primaryKey = 'id_region';
    public $timestamps = false;

}