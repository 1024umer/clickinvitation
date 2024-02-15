<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
    	'id_ad', 'id_ad_partner', 'id_partner', 'id_user', 'reference', 'id_contract', 'id_category', 'id_tipology', 'id_region', 'id_province', 'id_city', 'id_zone', 'id_zone_group', 'istat_code', 'address', 'address_hide', 'latitude', 'longitude', 'price', 'price_hide', 'description', 'build_year', 'rooms_number', 'bedrooms_number', 'bathrooms_number', 'area', 'id_kitchen', 'id_box', 'id_condition', 'id_heating', 'id_furnished', 'id_elevator', 'id_energy_class', 'id_energy_ape', 'ipe', 'id_garden', 'mq_garden', 'id_balcony', 'mq_balcony', 'id_terrace', 'mq_terrace', 'id_availability', 'id_accessibility', 'floors_number', 'id_floor', 'id_cellar', 'id_mansard', 'id_concierge', 'id_conditioner', 'id_property', 'id_internet', 'id_rent', 'position', 'id_luxury', 'id_vacancy', 'extra_charges', 'slug_tipology', 'slug_city', 'slug_zone', 'images_number', 'main_image', 'videos_number', 'main_video', 'plan_number', 'main_plan', 'rating', 'ranking', 'click', 'impression', 'phone_viewed', 'email_specific_number', 'status', 'insert_date', 'update_date', 'end_date', 'historicization_reason', 'keywords', 'searched_text', 'h3', 'tags', 'is_premium', 'coords_generic', 'date_creation_ad', 'asta'
    ];


    public function media()
    {
        return $this->hasMany('App\Media','id_ad','id_ad');
    }

    public function stat()
    {
        return $this->hasMany('App\Stat','id_ad','id_ad');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }


    public function city()
    {
        return $this->belongsTo('App\City', 'id_city', 'id_city');
    }


    public function province()
    {
        return $this->belongsTo('App\Province', 'id_province', 'id_province');
    }


    public function region()
    {
        return $this->belongsTo('App\Region', 'id_region', 'id_region');
    }


    public function zone()
    {
        return $this->belongsTo('App\Zone', 'id_zone', 'id_zone');
    }

    public function contract()
    {
        return $this->belongsTo('App\Adsfield', 'id_contract', 'id_field');
    }

    public function tipology()
    {
        return $this->belongsTo('App\Adsfield', 'id_tipology', 'id_field');
    }


    protected $table = 'ads';
    protected $primaryKey = 'id_ad';
    public $timestamps = false;

}