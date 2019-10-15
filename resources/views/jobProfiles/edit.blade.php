@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center">{{ $profiles->name }}</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-11 my-2 ">
                    <a href="{{ route('jobProfiles.index') }}">
                        <button type="submit" class="btn-custom btn-custom-blue">Back to Job Profiles</button>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Edit Job Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jobProfiles.update', $profiles->id) }}">
                        {{ method_field('PUT') }}
                        @csrf

                        <!-- from user -->
                        <div class="form-group row">
                            <label for="profile_name" class="col-md-2 col-form-label text-md-right">Job Profile Name</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" id="name" value="{{ $profiles->name }}">
                            </div>
                        </div>

                        <div class="from-group row mb-3">
                            <label for="importance" class="col-md-2 col-form-label text-md-right">Importance</label>
                            <div class="col-md-9">
                                <select name="importance" class="form-control" id="importance">
                                    @if ($profiles->importance == 'must_have')                              
                                        <option value="must_have" selected>Must Have</option>
                                        <option value="nice_to_have">Nice To Have</option>
                                        <option value="should_have">Should Have</option>
                                    @elseif ($profiles->importance == 'nice_to_have')
                                        <option value="must_have">Must Have</option>
                                        <option value="nice_to_have" selected>Nice To Have</option>
                                        <option value="should_have">Should Have</option>
                                    @elseif ($profiles->importance == 'should_have')
                                        <option value="must_have">Must Have</option>
                                        <option value="nice_to_have">Nice To Have</option>
                                        <option value="should_have" selected>Should Have</option>
                                    @else
                                        <option value="must_have">Must Have</option>
                                        <option value="nice_to_have">Nice To Have</option>
                                        <option value="should_have">Should Have</option>
                                    @endif                                                 
                                </select>
                            </div>                           
                        </div>                        

                        <div class="form-group row">
                            <div class="col-12 mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn-custom btn-custom-blue">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row mx-4 mt-5">
                        <div class="h3 my-5 text-center w-100">Required Skills</div>                        

                        <div class="col-12">
                            <div class="row mb-2">
                                <div class="col-md-3 h5 text-md-right font-weight-bold">Skill</div>
                                
                                <div class="col-md-3">
                                    <div class="h5 font-weight-bold">min_level</div>
                                </div>

                                <div class="col-md-3">
                                    <div class="h5 font-weight-bold">max_level</div>
                                </div>

                                <div class="col-3 d-inline"></div> {{-- column for buttons --}}
                            </div>
                        </div>

                        
                        @foreach($profiles->profileToSkills()->get() as $skill)

                            <form class="col-12" method="POST" action="{{ route('JobProfilesToSkill.update') }}">
                                
                                @csrf

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">{{ $skill->name }}</label>
                                    <input type="hidden" name="FK_skill" value="{{ $skill->pivot->FK_skill }}">
                                    <input type="hidden" name="FK_profile" value="{{ $skill->pivot->FK_profile }}">
                                    
                                    <div class="col-md-3">
                                        <input name="min_level" type="number" class="form-control" value="{{ $skill->pivot->min_level }}" id="min_level" min="1" max="5">
                                    </div>
                                    <div class="col-md-3">
                                        <input name="max_level" type="number" class="form-control" value="{{ $skill->pivot->max_level }}" id="max_level" min="1" max="5">
                                    </div> 
                                    <div class="col-3 d-inline">
                                        <button class="btn-custom btn-custom-blue" type="submit">update</button>
                                    </div>                                                                    
                                </div>      
                            </form>                
                        @endforeach                         
                    </div> {{-- end row for skills --}}
                    <div class="mb-4 my-4 text-center w-100">
                        <a href="{{ route('pts_attach', $profiles->id) }}">
                            <button class="btn-custom btn-custom-blue">add/remove skills</button>
                        </a>
                    </div>
                </div> {{-- card body end --}}
            </div> {{-- card end --}}
        </div> {{-- col-11 --}}
    </div> {{-- row --}}
</div> {{-- container end --}}
@endsection