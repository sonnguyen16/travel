<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translations';
    public $timestamps = false;
    protected $fillable = ['id', 'record_type', 'record_id', 'language_id', 'name', 'description', 'content', 'address', 'slug', 'maintenance_message'];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
