<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

	protected $fillable = ['date_birth','description', 'website', 'FK_user'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
