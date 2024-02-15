<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
    	'id_province', 'id_region', 'name', 'slug', 'code_province', 'province_local_name', 'abbreviation', 'latitude', 'longitude', 'geometry',
    ];

    /**
     * Gli ad di ogni provincia
     */
    public function ads()
    {
        return $this->hasMany('App\Ad', 'id_province');
    }


    protected $table = 'provinces';
    protected $primaryKey = 'id_province';
    public $timestamps = false;

}