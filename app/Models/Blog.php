<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $table = 'blogs';
	protected $fillable = ['id', 'menu_id','news_id', 'location_id', 'active', 'view', 'slug'];
	public $timestamps = true;

	public function user() {

		return $this->belongsTo('App\Models\User', 'user_fk');

	}
	public function activities() {
		return $this->hasmany('App\Models\Activity', 'blog_id', 'id');
	}
	public function menu() {
		return $this->belongsTo('App\Models\Menu', 'menu_id');
	}
	public function image($language_id)
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Blog')->where('name', 'Picture')->where('language_id', $language_id)->first();
    }
	public function images($language_id) {
		return $this->hasMany('App\Models\Image', 'record_id', 'id')->where('record_type', 'Blog')->where('name', 'Other')->where('language_id', $language_id)->get();
	}
	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Blog')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Blog');
	}

    public function image_fe()
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Blog')->where('name', 'Picture');
    }
}
