<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
	protected $fillable = ['id', 'active', 'faq_cate_id'];
	public $timestamps = true;
    public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\FaqTranslations', 'record_id', 'id')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\FaqTranslations', 'record_id', 'id');
	}
}
