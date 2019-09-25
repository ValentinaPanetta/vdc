<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content','image', 'video', 'active','title','FK_author'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
    public function comments()
    {
        return $this->hasMany('App\PostsComment','FK_post');
    }
    public function post_auth()
    {
        return $this->belongsTo('App\User','FK_author');
    }
}
