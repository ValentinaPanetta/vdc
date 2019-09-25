<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = ['description', 'start_date', 'salary', 'zipCode', 'street', 'city', 'country', 'working_hours', 'FK_profile', 'FK_company', 'FK_language'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;


    public function jobCompany()
    {
        return $this->belongsTo('App\PartnerCompanie', 'FK_company');
    }


    public function jobProfile()
    {
        return $this->belongsTo('App\JobProfile', 'FK_profile');
    }


    public function jobLanguage()
    {
        return $this->belongsTo('App\Language', 'FK_profile');
    }


}
