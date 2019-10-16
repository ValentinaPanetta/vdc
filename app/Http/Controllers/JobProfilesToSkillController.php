<?php

namespace App\Http\Controllers;

use App\JobProfilesToSkill;
use App\Skill;
use App\JobProfile;
use Illuminate\Http\Request;

class JobProfilesToSkillController extends Controller
{
    public function display($id){
        $FK_profile = $id;

        $skills = Skill::get();
        $profile = JobProfile::find($id);

        return view('jobProfiles.attach', compact('profile', 'skills', 'FK_profile'));
    }

    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'remove':
                redirect()->route('JobProfilesToSkill.detach');
                break;

            case 'update':
                redirect()->route('JobProfilesToSkill.update', $request);
                break;
        }
    }


    // function triggered from jobProfile/ View
    public function attach(Request $request) 
    {
        JobProfilesToSkill::create([          
            'FK_profile' => $request['FK_profile'],
            'FK_skill' => $request['FK_skill'],
            'min_level' => $request['min_level'],
            'max_level' => $request['max_level'],
        ]);
        return redirect('../pts_attach/'.$request['FK_profile']);
    }

    /*
    *  find relation row id from foreign keys
    */
    public function detach(Request $request)
    {
        $skill = $request['FK_skill'];
        $profile = $request['FK_profile'];
        $row = JobProfilesToSkill::where('FK_profile', '=', $profile)
                    ->where('FK_skill', '=', $skill);

        if($row){
            $piv_id = $row->first()->id;
            if(JobProfilesToSkill::destroy($piv_id)){
                return redirect('../pts_attach/'.$profile);
            }
        } else {
            return redirect('../pts_attach/'.$profile);
        }
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $skill = $request['FK_skill'];
        $profile = $request['FK_profile'];
        
        $jobID = JobProfilesToSkill::where('FK_profile', '=', $profile)
            ->where('FK_skill', '=', $skill)->first()->id;

        JobProfilesToSkill::where('id', $jobID)->update($request->except(['_token','_method']));

        return redirect()->route('jobProfiles.index');
    }

    /*
        destroy
    */
    public function delete($id)
    {
        if(JobProfilesToSkill::destroy($id))
        {
            return redirect('../jobProfiles');
        } else {
            return redirect('../jobProfiles');
        }

    }
}
