<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicemutuo extends Model
{
    protected $fillable = [
    	'id_index', 'name', 'time', 'every', 'percentage', 'index_type',
    ];


    protected $table = 'm_index';
    protected $primaryKey = 'id_index';
    public $timestamps = false;

}