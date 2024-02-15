<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'id_article', 'title', 'description', 'content', 'link', 'insert_date',
    ];


    protected $table = 'blog_articles';
    protected $primaryKey = 'id_article';
    public $timestamps = false;

}