<?php

namespace App\Http\Controllers;

// use App\User;
use App\Job;
use App\JobProfile;
use App\Language;
use App\PartnerCompanie;
// use App\PartnerEmployee;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $jobs = Job::get();

        return view('job/index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::get();
        $profiles = JobProfile::all(['id', 'name']);
        $languages = Language::all(['id', 'language_name']);
        $companies = PartnerCompanie::all(['id', 'company_name']);
        
        // $user = PartnerEmployee::where('FK_user', '=', Auth::user()->id)->get();

        return view('job/create', compact('jobs', 'profiles', 'languages', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Job::create([
            'description' => $request['description'],
            'start_date' => $request['start_date'],
            'salary' => $request['salary'],
            'zipCode' => $request['zipCode'],
            'city' => $request['city'],
            'country' => $request['country'],
            'street' => $request['street'],
            'working_hours' => $request['working_hours'],
            'FK_profile' => $request['FK_profile'],
            'FK_company' => $request['FK_company'],
            'FK_language' => $request['FK_language'],
        ]);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($job)
    {
        $job = Job::find($job);

        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($job)
    {
        $job = Job::find($job);
        $profiles = JobProfile::all(['id', 'name']);
        $languages = Language::all(['id', 'language_name']);
        $companies = PartnerCompanie::all(['id', 'company_name']);     

        return view('job/edit', compact('job', 'profiles', 'languages', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Job::where('id', $id)->update($request->except('_token', '_method'));

        return redirect('/job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Job::destroy($id)) {
            return redirect('job');
        } else {
            
            return redirect('courses');
        }
    }
}
