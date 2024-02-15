<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    protected $fillable = [
        'id_data', 'subusa', 'subcan', 'tps', 'tvq'
    ];

    protected $table = 'datas';
    protected $primaryKey = 'id_data';
    public $timestamps = false;
}
