@extends('layouts.adminPannel')
@section('content')
<div class='row d-flex justify-content-center align-items-start m-3 py-3' id="partners">

    <div class='col-lg-6 col-md-6 col-sm-12 my-3 py-3' id="course">
        <h5 class='text-blue'>{{ $courses->name }}</h5>
        <p>Version: {{ $courses->version }}</p>
        <p>{{ $courses->description }}</p>
        <p>{{ $courses->type }}</p>
        <p>{{ $courses->address }}</p>
        <p class="text-darkblue">From: {{ date('d-m-Y',strtotime($courses->start_date)) }}</p>
		<p class="text-darkblue">To: {{ date('d-m-Y',strtotime($courses->end_date)) }}</p>
        <p class="text-primary">Availability: 
            <span class="registered">
                {{ $courses->course_limit - $courses->courseToClient()->get()->count() }}
            </span>/ {{ $courses->course_limit }} </p>
        @foreach($courses->courseCompany()->get() as $company)
                <p class="text-darkblue">{{$company->company_name}}</p>
        @endforeach
        @foreach($courses->courseLanguage()->get() as $language)
                <p class="text-darkblue">{{$language->language_name}}</p>
        @endforeach
        <p class="font-weight-bold text-info">Skills:</p>
             @foreach($courses->courseToSkill()->get() as $skill)
                <p class="card-text">{{$skill->name}}<span class="small text-muted"> Level: {{$skill->pivot->lvl}}</span></p>
            @endforeach

        {{-- add a skill button for admins / course providers --}}
        @if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'course_provider')
        <a href="{{ route('attachSkills', $courses->id)}}">
            <button class="btn-custom btn-custom-blue my-2">add skill</button>
        </a>
        @endif
    
   <div class="">
    {{-- subscription buttons for clients --}}
    @if(Auth::user()->role == 'client')             
    @php ($subscribed = false)
        @foreach($courses->courseToClient()->get() as $client)
            @if($client->id == Auth::user()->id)   
                @php ($subscribed = true)
            @endif      
        @endforeach

        @if($subscribed == false)  
            <form method="POST" action="{{ route('ClientToCourse.attach') }}">                
            @csrf
                <input type="hidden" name="FK_client" value="{{ Auth::user()->id }}">
                <input type="hidden" name="FK_course" value="{{ $courses->id }}">
                <input type="hidden" name="client_status" value="registered">
                <button type="submit" class="btn-custom btn-custom-grey mr-2" onclick="return confirm('Are you sure to enroll in this course?')">enroll</button>
            </form>
        @else
           
        <div><div>This course is in your wish list!</div>
               <a href="{{ route('reservations.index')}}"> 

            <button type="submit" value="delete" class="btn-custom btn-custom-grey mr-2">
                Manage enrollment
            </button>
            </a>
           </div>
           
        @endif
    @endif

    {{-- crud buttons for admins / course providers --}}
    @if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'course_provider')
        <div class="d-flex justify-content-center">
			<a href="{{ route('courses.edit', $courses->id)}}">
			<button class="btn-custom btn-custom-blue">edit</button>
			</a>
			<form method="POST" action="{{ route('courses.destroy', $courses->id) }}">
			@csrf
			{{ method_field('DELETE') }}
			    
			 <button type="submit" value="delete" class="btn-custom btn-custom-grey mx-2" onclick="return confirm('Are you sure to delete?')">Delete</button>
			</form>
    @endif
    {{-- go back button for everyone --}}
    		<a href="{{ route('courses.index' )}}" >
    			<button class="btn-custom btn-custom-blue">Go Back</button>
    		</a>
        </div>

    </div>
	
</div>

@endsection