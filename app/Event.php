<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'id_event','guestCanSelectSeats', 'id_user', 'type', 'name', 'date', 'created_at', 'updated_at',
    ];

    protected $table = 'events';
    protected $primaryKey = 'id_event';
}