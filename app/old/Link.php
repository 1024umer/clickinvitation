<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'id', 'link',
    ];

    public $timestamps = false;
 
    protected $table = 'links';
}