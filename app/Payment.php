<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['FK_client', 'FK_course', 'price', 'pay_method', 'paid'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
