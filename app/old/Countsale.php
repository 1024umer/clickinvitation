<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countsale extends Model
{
    protected $fillable = [
    	'id_sale', 'id_original', 'name', 'slug', 'type', 'refer', 'cat_1', 'cat_2', 'cat_3', 'cat_4', 'tip_17', 'tip_18', 'tip_19', 'tip_20', 'tip_21', 'tip_22', 'tip_23', 'tip_24', 'tip_25', 'tip_26', 'tip_38', 'tip_40', 'tip_71', 'tip_72', 'tip_73', 'tip_74', 'tip_75', 'tip_76', 'tip_64', 'tip_65', 'tip_66', 'tip_81', 'tip_82', 'tip_83',
    ];


    protected $table = 'count_sale';
    public $timestamps = false;

}