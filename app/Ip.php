<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{

    protected $fillable = [
        'id',
    ];

    protected $table = 'ip';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
