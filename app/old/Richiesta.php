<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Richiesta extends Model
{
    protected $fillable = [
    	'id_email_direct', 'id_ad', 'id_user', 'name', 'surname', 'email', 'phone', 'message', 'business_name', 'email_adv', 'id_user_adv', 'insert_date', 'sended', 'form_type', 'tiscali', 'ip',
    ];


    protected $table = 'email_direct';
    protected $primaryKey = 'id_email_direct';
    public $timestamps = false;

}