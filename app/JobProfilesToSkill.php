<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfilesToSkill extends Model
{
    protected $fillable = ['FK_profile', 'FK_skill', 'min_level', 'max_level'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

}


