<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentTranslations extends Model
{
    protected $table = 'recruitment_translations';
    public $timestamps = true;
    protected $fillable = ['id', 'record_id', 'name', 'description', 'address', 'salary', 'working_form', 'department', 'unit', 'language_id', 'slug'];
}
