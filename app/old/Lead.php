<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
    	'id_lead', 'insert_date', 'name', 'surname', 'email', 'telefono', 'comune', 'provincia', 'orario', 'messaggio', 'eta', 'reddito', 'anticipo', 'id_ad', 'id_user', 'prezzo', 'url_ad', 'nome_agenzia', 'email_agenzia', 'tel_agenzia', 'indirizzo_agenzia', 'comune_agenzia', 'rata_ad', 'min_rata', 'max_rata', 'max_spesa', 'durata', 'spese_mensili', 'form_type', 'sent', 'referral', 'ip',
    ];


    protected $table = 'leads';
    protected $primaryKey = 'id_lead';
    public $timestamps = false;

}