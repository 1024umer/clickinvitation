<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
    	'id_media', 'id_ad', 'id_partner', 'url', 'url_thumb_1', 'url_thumb_2', 'url_thumb_3', 'url_back', 'download_time', 'media_order', 'id_media_type', 'status', 'insert_date', 'bloked', 'end_date', 'id_ad_partner',
    ];


    protected $table = 'media';
    protected $primaryKey = 'id_media';
    public $timestamps = false;

}