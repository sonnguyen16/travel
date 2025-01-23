<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
	protected $fillable = ['id', 'name', 'slug'];
	public $timestamps = false;
    public function products() {
		return $this->hasmany('App\Models\Product', 'location_id');
	}
    public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Location')->where('language_id', $languageId);
    }
    public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Location');
	}
}
