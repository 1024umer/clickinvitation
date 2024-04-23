<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'id','id_table', 'seat_name', 'id_guest',
    ];

    protected $table = 'seats';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
