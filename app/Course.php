<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = ['name','version', 'description', 'zipCode', 'street', 'city', 'country', 'course_limit', 'start_date', 'end_date', 'type', 'active_status', 'price','FK_company', 'FK_language'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    public function courseCompany(){
    	return $this->belongsTo('App\PartnerCompanie', 'FK_company');
    }

    public function courseLanguage(){
    	return $this->belongsTo('App\Language', 'FK_language');
    }
}