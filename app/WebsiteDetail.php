<?php

namespace App;

use App\Website;
use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model
{
    protected $fillable = ['website_id', 'element', 'style', 'value'];
    public function website(){
        return $this->belongsTo(Website::class);
    }
}
