<?php

namespace App\Http\Controllers;

use App\JobProfile;
use App\Skill;
use Illuminate\Http\Request;

class JobProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = JobProfile::get();
        $skills = Skill::all(['id', 'name']);

        return view('jobProfiles/index', compact('profiles', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = JobProfile::get();
        $skills = Skill::all(['id', 'name']);

        return view('jobProfiles/create', compact('profiles', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         JobProfile::create([
            'name' => $request['name'],
            'importance' => $request['importance'],
        ]);

         return redirect()->route('jobProfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    {
        $profiles = JobProfile::find($profile);
        $skills = Skill::all(['id', 'name']);

        return view('jobProfiles.show', compact('profiles', 'skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $profiles = JobProfile::find($profile);
        $skills = Skill::all(['id', 'name']);

        return view('jobProfiles/edit', compact('profiles', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        JobProfile::where('id', $id)->update($request->except(['_token','_method']));

        return redirect()->route('jobProfiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (JobProfile::destroy($id)) {
            return redirect('jobProfiles');
        } else {
            return redirect('jobProfiles');
        }
    }
}
