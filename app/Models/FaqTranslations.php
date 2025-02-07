<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqTranslations extends Model
{
    protected $table = 'faq_translations';
	protected $fillable = ['id', 'record_id', 'language_id', 'question', 'answer'];
	public $timestamps = true;
    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id', 'id');
    }
}
