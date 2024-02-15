<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lastseen extends Model
{
    protected $fillable = [
    	'id_lastseen', 'id_ad',
    ];

    /**
     * Restituisce l'aannuncio associato a id_ad.
     */
    public function ad()
    {
        return $this->hasOne('App\Ad','id_ad','id_ad');
    }


    protected $table = 'last_seen';
    protected $primaryKey = 'id_lastseen';
    public $timestamps = false;

}