<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['content','FK_subject', 'FK_author', 'FK_company'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    public function author(){
    	return $this->belongsTo('App\User', 'FK_author');
    }

}
