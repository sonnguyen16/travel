<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
	protected $fillable = ['id', 'name', 'content', 'active', 'slug', 'blog_id'];
	public $timestamps = true;

	public function image()
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Activity');
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id', 'id');
    }

	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Activity')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Activity');
	}
}
