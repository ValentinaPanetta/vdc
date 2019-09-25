<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesToSkill extends Model
{
	protected $fillable = ['lvl', 'FK_course', 'FK_skill'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
