<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seoad extends Model
{
    protected $fillable = [
    	'id', 'id_ad', 'title', 'url', 'h2', 'h3', 'tag',
    ];


    protected $table = 'seo_ads';
    protected $primaryKey = 'id';
    public $timestamps = false;

}