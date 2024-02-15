<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{

    protected $fillable = [
        'id_code', 'code', 'type', 'expiredate', 'remainusers', 'discount',
    ];

    protected $table = 'codes';
    protected $primaryKey = 'id_code';
    public $timestamps = false;
}