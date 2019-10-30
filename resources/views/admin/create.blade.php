@extends('layouts.adminPannel')

@section('content')

	<div class="d-flex justify-content-around ">
    <a href="{{ route('admin.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow ">Users List</div>
	</a>
	<a href="{{ route('admin.create')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow " 
		 style="border: 3px solid white; text-shadow: 2px 2px #000024">Create User</div>
	</a>
	<a href="{{ route('languages.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">Languages</div>
	</a>
	<a href="{{ route('jobProfiles.index')}}" >
   		<div class="bg-darkcyan-t p-2 text-white big_text shadow">Job Profiles</div>
	</a>
	<a href="{{ route('skills.index')}}" >
        <div class="bg-darkcyan-t p-2 text-white big_text shadow">Skills table</div>
    </a>
	<a href="{{ route('companies.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">COMPANIES table</div>
	</a>
	</div>
	<div class="p-5  bg-dark-t text-white mt-3">
		<h3 class="text-center">New User Creation</h3>
		 <form method="POST" action="{{ route('admin.store') }}">

			@csrf
			

		  <div class="form-group">
		    <label class="font-weight-bold h2" for="role">ROLE</label>
		    <select name="role" class="form-control" id="role">
		      <option value="client">Client</option>
		      <option value="consultant">Consultant</option>
		      <option value="trainer">Trainer</option>
		      <option value="course_provider">Course Provider</option>
		      <option value="employer">Employer</option>
		      <option value="off_admin">Office Admin</option>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="name_add">Name</label>
		    <input name="name" type="text" class="form-control" id="name_add" placeholder="Name" required>
		  </div>
		  <div class="form-group">
		    <label for="lastname_add">Last Name</label>
		    <input name="last_name" type="text" class="form-control" id="lastname_add" placeholder="Optional">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Email address</label>
		    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
		  </div>

		  <div class="form-group ">
            <label for="password" >{{ __('Password') }}</label>

            <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group ">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <div >
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
		  <div class="form-group">
		    <label for="phone_add">Phone</label>
		    <input name="phone" type="text" class="form-control" id="phone_add" placeholder="Optional">
		  </div>

		   <div class="form-group">
		    <label  for="regi_type">Registration type</label>
		    <select name="registration_type"  class="form-control" id="regi_type">
		      <option value="vdc">VDC</option>
		      <option value="external">External</option>
		    </select>
		  </div>


			<input name="image" type="hidden" value="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">	


		  <div class="form-group">
		    <label for="gender">Gender</label>
		    <select name="gender" class="form-control" id="gender">
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