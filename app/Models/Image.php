<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'record_type', 'record_id', 'language_id', 'picture'];
}
