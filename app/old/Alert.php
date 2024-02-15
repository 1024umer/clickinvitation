<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
    	'id_email_alert', 'id_user', 'name', 'email', 'surname', 'id_province', 'id_city', 'id_zone_group', 'circle', 'poly', 'id_contract', 'id_category', 'id_tipology', 'url_search', 'params_json', 'is_rata', 'insert_date', 'sended', 'last_send'
    ];


    protected $table = 'email_alert';
    protected $primaryKey = 'id_email_alert';
    public $timestamps = false;

}