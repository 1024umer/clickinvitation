<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodottomutuo extends Model
{
    protected $fillable = [
    	'id_prod', 'name', 'id_index', 'ltv', 'durata', 'spread', 'taeg',
    ];


    protected $table = 'm_products';
    protected $primaryKey = 'id_prod';
    public $timestamps = false;

}