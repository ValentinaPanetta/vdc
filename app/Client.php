<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	public function userClient()
    {
        return $this->belongsTo('App\User', 'FK_user');
    }

	protected $fillable = ['date_birth','description','FK_user','website'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
