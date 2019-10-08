<?php

namespace App\Http\Controllers;

use App\CoursesToSkill;
use App\Course;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesToSkillController extends Controller
{

    public function display($id){
        $FK_course = $id;

        $skills = Skill::get();
        $course = Course::find($id);

        return view('courses.attach', compact('course', 'skills', 'FK_course'));
    }

    public function attach(Request $request){

     CoursesToSkill::create([          
            'FK_course' => $request['FK_course'],
            'FK_skill' => $request['FK_skill'],
            'lvl' => $request['lvl'],
        ]);
        
        
    return redirect('../attachSkills/'.$request['FK_course']);
    }


    public function detach(Request $request){
        $course = $request['FK_course'];
        $skill = $request['FK_skill'];
        $row = CoursesToSkill::where('FK_course', '=', $course)->where('FK_skill', '=', $skill);
        if($row){
            $id = $row->first()->id;
            if(CoursesToSkill::destroy($id)){
             
              return redirect('../attachSkills/'.$course);
            }
        }else{
        return redirect('../attachSkills/'.$course);
    }      
       
    }

    
}
