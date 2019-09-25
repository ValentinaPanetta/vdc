<?php

namespace App\Http\Controllers;

use App\ProfilesToSkill;
use App\Skill;
use App\JobProfile;
use Illuminate\Http\Request;

class ProfilesToSkillController extends Controller
{
    // function triggered from jobProfile/ View
    public function attach(Request $request) 
    {
        JobProfilesToSkill::create([          
            'FK_profile' => $request['FK_client'],
            'FK_skill' => $request['FK_consulting'],
            'min_level' => $request['FK_consulting'],
            'max_level' => $request['FK_consulting'],
        ]);
        return redirect('../jobProfiles/'.$request['FK_profile']);
    }

    /*
        find relation row id from foreign keys
    */
    public function detach(Request $request)
    {
        $skill = $request['FK_skill'];
        $profile = $request['FK_profile'];
        $piv_id = JobProfilesToSkill::where('FK_skill', '=', $skill)
                    ->where('FK_profile', '=', 'profile')->first()->id;

        return view('../jobProfiles/confirm', compact('piv_id', 'profile'));
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
        $skill = $request['FK_skill'];
        
        $jobID = JobProfilesToSkill::where('FK_profile', '=', $id)
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
