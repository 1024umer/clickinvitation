<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
    	'id_stat', 'id_ad', 'id_user', 'id_partner', 'email_direct_number', 'click', 'impression', 'phone_viewed', 'ranking',
    ];


    protected $table = 'ads_stats';
    protected $primaryKey = 'id_stat';
    public $timestamps = false;

}