<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    protected $fillable = [
        'id_meal', 'name', 'description', 'id_event',
    ];

    protected $table = 'meals';
    protected $primaryKey = 'id_meal';
    public $timestamps = false;
}
