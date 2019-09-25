<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsComment extends Model
{
   protected $fillable = ['content','FK_post','FK_author'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
    public function comm_auth()
    {
        return $this->belongsTo('App\User','FK_author');
    }
}
