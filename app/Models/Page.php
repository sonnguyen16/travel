<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
	public $timestamps = true;
	protected $fillable = ['id', 'slug'];
	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Page')->where('language_id', $languageId);
    }

    public function translations()
    {
        return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'Page');
    }
}
