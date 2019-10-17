<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsToCourse extends Model
{
	protected $fillable = ['client_status', 'FK_client', 'FK_course'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;


    public function findCourse()
    {
        return $this->belongsTo('App\Course', 'FK_course');
    }
}

