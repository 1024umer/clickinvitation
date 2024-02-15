<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    protected $fillable = [
        
    ];

    protected $table = 'guests';
    protected $primaryKey = 'id_guest';
    public $timestamps = false;
}
