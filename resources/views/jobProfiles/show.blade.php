@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 h2 text-center">Specific Job Offer</div>
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
                <div class="card-header">Job Profile</div>                

                <div class="card-body">
                    <div class="form-group row px-5">
                    	<div><b>Name: </b>{{ $profiles->name }}</div>                  	
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Importance: </b>{{ $profiles->importance }}</div>                  	
                    </div>                         
                </div>
            </div>

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
                    @if($profiles->profileToSkills()->get()->count() > 0)
                        <tr>
                            <form method="POST" action="{{-- {{ route('ProfilesToSkill.detach') }} --}}">
                            @csrf
                                <td class="pl-4">
                                    <input class="form-check-input" type="checkbox" name="" checked>
                                    <label>{{ $skill->name }}</label>
                                </td>
                                <td class="py-2">
                                    <input class="col-11 form-control" type="number" name="min_level" value="{{ $skill->pivot->min_level }}">
                                </td>
                                <td>
                                    <input class="col-11 form-control" type="number" name="max_level" value="{{ $skill->pivot->max_level }}">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit">add</button>
                                </td>
                            </form>                            
                        </tr>
                    @else
                        <tr>
                            <form method="POST" action="{{-- {{ route('ProfilesToSkill.attach') }} --}}">
                            {{ method_field('GET') }}
                            @csrf
                                <td class="pl-4">
                                    <input class="form-check-input" type="checkbox" name="">
                                    <label>{{ $skill->name }}</label>
                                </td>
                                <td class="py-2">
                                    <input class="col-11 form-control" type="number" name="min_level" value="{{ $skill->pivot->min_level }}">
                                </td>
                                <td>
                                    <input class="col-11 form-control" type="number" name="max_level" value="{{ $skill->pivot->max_level }}">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit">add</button>
                                </td>
                            </form>                            
                        </tr>
                    @endif
                @endforeach
                </tbody>
                </table>                        
            </div>
        </div>
    </div>
</div>
@endsection