<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adsfield extends Model
{
    protected $fillable = [
    	'id_field', 'text', 'slug', 'field_ads', 'refer', 'alias',
    ];


    protected $table = 'ads_fields';
    protected $primaryKey = 'id_field';
    public $timestamps = false;

}