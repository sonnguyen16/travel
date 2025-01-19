<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = 'recruitments';
    public $timestamps = true;
    // protected $fillable = ['id', 'unit_id', 'department_id', 'deadline', 'active', 'slug'];
    protected $fillable = ['id', 'deadline', 'active', 'slug'];


    public function image($language_id)
    {
        return $this->hasOne('App\Models\Image', 'record_id', 'id')->where('record_type', 'Recruitment')->where('name', 'Picture')->where('language_id', $language_id)->first();
    }
	public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\RecruitmentTranslations', 'record_id', 'id')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\RecruitmentTranslations', 'record_id', 'id');
	}

}
