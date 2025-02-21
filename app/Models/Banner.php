<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
	protected $fillable = ['id', 'name', 'active', 'link', 'slug', 'item', 'picture'];
	public $timestamps = true;
    public function image()
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Banner');
    }
}
