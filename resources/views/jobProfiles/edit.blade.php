@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center">Edit Job Profile</div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('jobProfiles.index') }}">
                        <button type="submit" class="btn btn-primary">
                        Go Back
                    </button></a>
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
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="row mx-4 mt-5">
                        <div class="h4 mb-3">Required Skills</div>
                        <table class="col-12 p-0 mt-3">                                 
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
                                <form method="POST" action="{{-- {{ route('ProfilesToSkill.update') }} --}}">
                                {{ method_field('PUT') }}
                                @csrf
                                <h2>{{$skill->pivot->FK_skill}}</h2>
                                    <td class="pl-4">                                        
                                        <label>{{ $skill->name }}</label>
                                        <input type="hidden" name="FK_skill" value="'.$skills[$i]->id.'">
                                        <input type="hidden" name="FK_profile" value="'.$FK_profile.'">
                                    </td>
                                    <td class="py-2">
                                        <input class="col-11 form-control" type="number" name="min_level" value="{{ $skill->pivot->min_level }}">
                                    </td>
                                    <td>
                                        <input class="col-11 form-control" type="number" name="max_level" value="{{ $skill->pivot->max_level }}">
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="submit">edit</button>
                                    </td>
                                </form>                            
                            </tr>                        
                        @endforeach
                        </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection