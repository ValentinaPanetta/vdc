<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    protected $fillable = ['name','importance'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    // public function profileSkill()
    // {
    //     return $this->belongsTo('App\Skill', 'FK_skill');
    // }

    public function profileToSkills()
    {
    	return $this->belongsToMany(
    		'App\Skill',
    		'job_profiles_to_skills',
    		'FK_profile',
    		'FK_skill'
    	)->withPivot('min_level', 'max_level');
    }
}
