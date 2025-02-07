<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
	public $timestamps = false;
	protected $fillable = ['id', 'menu_fk', 'slug'];
	public function user() {
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function Projects() {
		return $this->hasmany('App\Models\Project', 'menu_fk');
	}
	// accesstor
	public function getUserNameAttribute() {
		if (!empty($this->user)) return $this->user->user_name;
		return 'empty';
	}
	public function Menu() {
		return $this->hasmany('App\Models\Menu', 'menu_fk', 'id');
	}

    public function parent()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_fk');
    }

	public function Blogs() {
		return $this->hasmany('App\Models\Blog', 'menu_id');
	}
	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Menu')->where('language_id', $languageId);
    }
	public function image()
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Menu');
    }
	public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Menu');
	}

}
