<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $fillable = ['name','version', 'description', 'zipCode', 'street', 'city', 'country', 'course_limit', 'start_date', 'end_date', 'type', 'active_status', 'price','FK_company', 'FK_language'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    /* function to access parent table
    @param: Parent table, foreign key of child table
    */
    public function courseCompany(){
    	return $this->belongsTo('App\PartnerCompanie', 'FK_company');
    }

    public function courseLanguage(){
    	return $this->belongsTo('App\Language', 'FK_language');
    }

    /* function to access to tables through many to many relational table
    @belongsToMany param: Table to connect, relational table, foreign key of the starting table, foreign key of the second table.
    @withPivot('additional data of the relational table')
    */
    public function courseToSkill(){
    	return $this->belongsToMany('App\Skill', 'courses_to_skills', 'FK_course', 'FK_skill')->withPivot('lvl');
    }

    public function courseToClient(){
        return $this->belongsToMany('App\User', 'clients_to_courses', 'FK_course', 'FK_client')->withPivot('client_status');
    }
    
    
    
    // public function paidCourse()
    // {
    //     return $this->hasMany('App\Payment', 'FK_course');
    // }



}