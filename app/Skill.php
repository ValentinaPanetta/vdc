<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;

    /* function to access to tables through many to many relational table
    @belongsToMany param: Table to connect, relational table, foreign key of the starting table, foreign key of the second table.
    @withPivot('additional data of the relational table')
    */
    public function skillToCourse(){
    	return $this->belongsToMany('App\Course', 'course_skill', 'FK_skill', 'FK_course')->withPivot('lvl');
    }
}
