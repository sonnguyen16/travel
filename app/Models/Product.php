<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	public $timestamps = true;
	protected $fillable = ['id', 'slug', 'active', 'location_id', 'price', 'price_child'];

	public function user() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}
	// accesstor
	public function getUserNameAttribute() {
		if (!empty($this->user)) return $this->user->user_name;
		return 'empty';
	}
	public function location() {
		return $this->belongsTo('App\Models\Location', 'location_id');
	}
	public function image($language_id = 1)
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Product')->where('name', 'Picture')->where('language_id', $language_id)->first();
    }
	public function images($language_id = 1) {
		return $this->hasMany('App\Models\Image', 'record_id', 'id')->where('record_type', 'Product')->where('name', 'Other')->where('language_id', $language_id)->get();
	}
	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Product')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Product');
	}

    public function image_fe()
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Product')->where('name', 'Picture');
    }
}
