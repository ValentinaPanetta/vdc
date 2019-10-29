@extends('layouts.default')

@section('content')

@if($res->id == Auth::user()->id)
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
	<div class="shadow bg-darkcyan-t  p-2" style="border: 2px solid rgb(78,193,224)">
		<a class="p-5 text-white" href="{{ url('account/'.Auth::user()->id.'/edit')}}" >
		Edit Account
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
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
		@if ($errors->any())
		    <div class="alert alert-danger alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		            <span aria-hidden="true">×</span>
		        </button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>
		                    {{ $error }}
		                </li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		 <form method="POST" action="{{ route('account.update', $res->id) }}"  enctype="multipart/form-data">
			@csrf 
			{{ method_field('PUT') }}
		  <div class="form-group">
		    <label for="name_add">Name</label>
		    <input name="name" type="text" class="form-control" id="name_add" value="{{ $res->name }}" required>
		  </div>
		  <div class="form-group">
		    <label for="lastname_add">Last Name</label>
		    <input name="last_name" type="text" class="form-control" id="lastname_add" value="{{ $res->last_name }}">
		  </div>


		  <div class="form-group">
		    <label for="phone_add">Phone</label>
		    <input value="{{ $res->phone }}" name="phone" type="text" class="form-control" id="phone_add" placeholder="Optional">
		  </div>

		
		  <div class="form-group">
	<!-- 	    <label for="image">Profile Picture</label>{{-- $res->image --}}
					<input name="image" type="text"  class="form-control" value=""> -->	
    			<div for="image">Profile Picture</div>
    			<input type="file" class="btn btn-success "  name="image" >
		</div>


		  <div class="form-group">
		    <label for="gender">Gender</label>
		    <select name="gender" class="form-control" id="gender">
		      <option value="{{ $res->gender }}">{{ $res->gender }}</option>
		      <option>Private</option>
		      <option value="male">Male</option>
		      <option value="female">Female</option>
		      <option value="other">Other</option>
		    </select>
		  </div>

		<div class="p-2">
			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		
		</form>
		
	</div>
@endsection