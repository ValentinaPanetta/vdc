<?php

namespace App\Http\Controllers;

use App\Course;
use App\PartnerCompanie;
use App\Language;
use App\CoursesToSkill;
use App\Skill;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

         if(request()->ajax())
         {
                  if(!empty($request->search_course))
                      {
                            $ar = Course::where('name', 'like',  $request->search_course. '%')->get();
                          
                     return  $ar; 
                        }
                      
        }else{
            {
                $courses = Course::get();
            }
           return view('courses.index', compact('courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Model::all(['column_in_table']) to get all the data of those columns from all rows
        
        $companies = PartnerCompanie::all(['id', 'company_name']);
        $languages = Language::all(['id', 'language_name']);
        $skills = Skill::all(['id', 'name']);
        $courses = Course::get();

        return view('courses/create', compact('courses', 'companies', 'languages', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Course::create([
            'name' => $request['name'],
            'version' => $request['version'],
            'description' => $request['description'],
            'zipCode' => $request['zipCode'],
            'street' => $request['street'],
            'city' => $request['city'],
            'country' => $request['country'],
            'course_limit' => $request['course_limit'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'type' => $request['type'],
            'active_status' => $request['active_status'],
            'price' => $request['price'],
            'FK_company' => $request['FK_company'],
            'FK_language' => $request['FK_language'],
        ]);

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
        $courses = Course::find($course);

        return view('courses.show', compact('courses'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {   
        $courses = Course::find($course);
        $companies = PartnerCompanie::all(['id', 'company_name']);
        $languages = Language::all(['id', 'language_name']);
       
        return view('courses/edit', compact('courses', 'companies', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Course::where('id', $id)->update($request->except(['_token','_method']));
        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Course::destroy($id)) {
            
            return redirect('courses');
            
            }else{
            
            return redirect('courses');
        }

    }
}
