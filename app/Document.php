<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['name','path', 'FK_user'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    
}
