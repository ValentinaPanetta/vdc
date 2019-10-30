@extends('layouts.adminPannel')
@section('content')
    <div class="row mx-4 my-5 bg-dark-t text-white">
        <div class="col-12 h2 text-center mb-3">{{ $profile->name }}</div>
        <div class="mb-4 my-2 w-100">            
            <p class="h4 text-center">Required Skills</p>
            <a href="{{ route('jobProfiles.show', $profile->id) }}">
                <button class="btn-custom btn-success pointer">Back to Profile</button>
            </a>
        </div>

        <div class="col-12">
            <div class="row mb-2">
                <div class="col-md-3 h5 text-md-right font-weight-bold">Skill</div>
                
                <div class="col-md-3">
                    <div class="h5 font-weight-bold">min_level</div>
                </div>

                <div class="col-md-3">
                    <div class="h5 font-weight-bold">max_level</div>
                </div>

                <div class="col-3 d-inline">                
                </div>
            </div>
        </div>

            
       
        @php
            for($i=0; $i<count($skills); $i++){
                $sk_id = $skills[$i]->id;
                $check = false;
        @endphp
            @foreach($profile->profileToSkills as $res)
                @if($res->pivot->FK_skill == $sk_id)
                    @php
                    $check = true;
                    @endphp
                
                    @if($check == true)                        
                        @php echo'                            
                            <form class="col-12" method="POST" action="';
                        @endphp

                            {{ route('JobProfilesToSkill.detach') }}

                        @php echo'">'; @endphp

                        {{ method_field('GET') }}
                        @csrf
                        
                        @php echo'
                                <div class="form-group row ">
                                    <label class="col-md-3 col-form-label text-md-right">'.$skills[$i]->name.'</label>
                                    <input type="hidden" name="FK_skill" value="'.$skills[$i]->id.'">
                                    <input type="hidden" name="FK_profile" value="'.$FK_profile.'">

                                    <div class="col-md-3">
                                        <input name="min_level" type="number" class="form-control" value="'.$res->pivot->min_level.'" id="min_level" min="1" max="5" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="max-level" type="number" class="form-control" value="'.$res->pivot->max_level.'" id="max_level" min="1" max="5"disabled>
                                    </div> 
                                    <div class="col-3 d-inline">
                                        <button class="btn btn-secondary" type="submit">remove</button>
                                    </div>                                                                    
                                </div>                                
                            </form>';
                        @endphp
                    @endif
                @endif
            @endforeach

            @if($check == false)
                @php echo'
                    
                    <form class="col-12" method="POST" action="';
                @endphp

                    {{ route('JobProfilesToSkill.attach') }}

                @php echo'">'; @endphp

                @csrf
                    
                @php echo'
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">'.$skills[$i]->name.'</label>
                            <input type="hidden" name="FK_skill" value="'.$skills[$i]->id.'">
                            <input type="hidden" name="FK_profile" value="'.$FK_profile.'">

                            <div class="col-md-3">
                                <input name="min_level" type="number" class="form-control" value="" id="min_level" min="1" max="5">
                            </div>

                            <div class="col-md-3">
                                <input name="max_level" type="number" class="form-control" value="" id="max_level" min="1" max="5">
                            </div>
                            <div class="col-3 d-inline">
                                <button class="btn-custom btn-info px-4" type="submit">add</button>
                            </div>
                        </div>   
                    </form>';
                @endphp
            @endif
            @php } @endphp
        <div class="mb-4 my-4 text-center w-100">
            <a href="{{ route('jobProfiles.edit', $profile->id) }}">
                <button class="btn-custom btn-info">Edit Values</button>
            </a>
        </div>                              
    </div>
@endsection