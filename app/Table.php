<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

    protected $fillable = [
        'id_table', 'name', 'number', 'id_event',
    ];

    protected $table = 'tables';
    protected $primaryKey = 'id_table';
    public $timestamps = false;
}
