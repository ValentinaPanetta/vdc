@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center text-white">{{ $profiles->name }}</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('jobProfiles.index') }}">
                        <button type="submit" class="btn-custom btn-custom-blue my-3">
                        Back to Job Profiles
                    </button></a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Job Profile</div>                

                <div class="card-body">
                    {{-- <div class="form-group row px-5">
                    	<div><b>Name: </b>{{ $profiles->name }}</div>                  	
                    </div> --}}

                    <div class="form-group row px-5">
                    	<div><b>Importance: </b>{{ $profiles->importance }}</div>                  	
                    </div> 

                    <hr class="my-3">
                    
                    <div class="row px-5 mb-5">
                        <table class="col-6">                                 
                            <thead>
                                <tr>
                                    <th>Skills</th>
                                    <th>min-lvl</th>
                                    <th>max-lvl</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($profiles->profileToSkills()->get() as $skill)                         
                                <tr>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->pivot->min_level }}</td>
                                    <td>{{ $skill->pivot->max_level }}</td>                             
                                </tr>
                            @endforeach 
                            </tbody>
                        </table>
                    </div>                    

                    <div class="row px-5 mt-4">
                        <a href="{{ route('pts_attach', $profiles->id) }}">
                            <button class="btn-custom btn-custom-blue">Add Skill</button>
                        </a>
                    </div>                        
                </div>

                
            </div>

            
                        
        </div>
    </div>
</div>
@endsection