<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{

    protected $fillable = [
        'id_gift', 'name', 'description', 'link', 'id_event',
    ];

    protected $table = 'gifts';
    protected $primaryKey = 'id_gift';
    public $timestamps = false;
}
