<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = [
        'id_card', 'id_event', 'id_user',
        "title1", "title2", "title3", "title4", "titleFont", "titleColor", "name1", "name2", "cermony", "cermonyFont", "cermonyColor", "other1",
        "other2", "other3", "otherFont", "otherColor", "bgName", "cardName", "fontColor", "fontFamily", "customCard",'created_at', 'updated_at',
    ];

    protected $table = 'cards';
    protected $primaryKey = 'id_card';
}