<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsToConsulting extends Model
{
    protected $fillable = [
        'FK_consulting', 'FK_client', 
    ];

    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;


}
