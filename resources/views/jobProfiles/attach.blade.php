@extends('layouts.adminPannel')
@section('content')
    <div class="row mx-4 mt-5">
        <div class="col-12 h2 text-center mb-3">{{ $profile->name }}</div>
        <div class="mb-4 my-2 w-100">            
            <p class="h4 text-center">Required Skills</p>
            <a href="{{ route('jobProfiles.show', $profile->id) }}">
                <button class="btn-custom btn-custom-blue pointer">Back to Profile</button>
            </a>
        </div>
        {{-- <table class="col-12 p-0 mt-3">  --}}                                
        {{-- <thead>
            <tr>
                <th>Skills</th>
                <th>min-lvl</th>
                <th>max-lvl</th>
            </tr>
        </thead> --}}

        {{-- <tbody> --}}
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
                
                    @if($check == true )                        
                        @php echo'
                            
                            <form class="col-12" method="POST" action="';
                        @endphp

                            {{ route('JobProfilesToSkill.detach') }}

                        @php echo'">'; @endphp

                        {{ method_field('GET') }}
                        @csrf
                        
                        @php echo'
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">'.$skills[$i]->name.'</label>
                                    <input type="hidden" name="FK_skill" value="'.$skills[$i]->id.'">
                                    <input type="hidden" name="FK_profile" value="'.$FK_profile.'">

                                    <div class="col-md-3">
                                        <input name="min_level" class="form-control" value="" id="min_level">
                                    </div>

                                    <div class="col-md-3">
                                        <input name="max-level" class="form-control" value="" id="max_level">
                                    </div>

                                    <div class="col-3 d-inline">
                                        <button class="btn-custom btn-custom-grey" type="submit">remove</button>
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
                                <input name="min_level" class="form-control" value="" id="min_level">
                            </div>

                            <div class="col-md-3">
                                <input name="max_level" class="form-control" value="" id="max_level">
                            </div>

                            <div class="col-3 d-inline">
                                <button class="btn-custom btn-custom-blue px-4" type="submit">add</button>
                            </div>
                        </div>   
                    </form>';
                @endphp
            @endif
            @php } @endphp    
        {{-- </tbody>
        </table> --}}                        
    </div>
@endsection