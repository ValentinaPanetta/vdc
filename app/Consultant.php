<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
	protected $fillable = ['date_birth','description','FK_user'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
