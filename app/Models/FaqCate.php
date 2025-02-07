<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCate extends Model
{
    protected $table = 'faq_categories';
	protected $fillable = ['id'];
	public $timestamps = true;
    public function translation($languageId = 1)
    {
        return $this->hasOne('App\Models\Translation', 'record_id', 'id')->where('record_type', 'FaqCate')->where('language_id', $languageId);
    }
	public function translations()
	{
		return $this->hasMany('App\Models\Translation', 'record_id', 'id')->where('record_type', 'FaqCate');
	}
}
