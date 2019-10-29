@extends('layouts.default')

@section('content')

@foreach ($res as $res)
	{{-- expr --}}
@if($ur->id == Auth::user()->id)
<div class="d-flex justify-content-around ">
	<div class="shadow bg-darkcyan-t p-2" >
		@switch(Auth::user()->role) 
                @case('client')
                    
                         <a class="p-5 text-white" href="{{ url('client/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('consultant')
                    
                         <a class="p-5 text-white" href="{{ url('consultant/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('trainer')
                    
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('course_provider')
                    
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
        @endswitch
	</div>
	<div class="shadow bg-darkcyan-t  p-2" >
		<a class="p-5 text-white" href="{{ url('account/'.Auth::user()->id.'/edit')}}" >
		Edit Account
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2" style="border: 2px solid rgb(78,193,224)">
		<a  class="p-5 text-white"href="{{ url('client/'.Auth::user()->id.'/edit')}}" >
		Edit Profile
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('documents/'.Auth::user()->id)}}" >
		Documents
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('reservations/')}}" >
		My Courses
		</a>
	</div>
</div>
@endif

	<div class="p-5 bg-dark-t my-3 text-white">
		 <form method="POST" action="{{ route('client.update', $res->id) }}">
			@csrf 
			{{ method_field('PUT') }}

		  <div class="form-group">
		    <label for="date_birth">Date of Birth</label>
		    <input name="date_birth" type="date" class="form-control" id="date_birth" value="{{ $res->date_birth }}">
		  </div>
		  <div class="form-group">
		    <label for="description">About You</label>
			    <textarea name="description" type="text" class="form-control" id="description" >
			    	{{ $res->description }}
			    </textarea> 
		  </div>
		  <div class="form-group">
		    <label for="website">Website</label>
		    <input value="{{ $res->website }}" name="website" type="text" class="form-control" id="website"  >
		  </div>		  		

		<div class="p-2">
			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		
		</form>
		
	</div>
@endforeach
@endsection