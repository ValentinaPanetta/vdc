<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	protected $fillable = ['language_name'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
