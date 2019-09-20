@extends('layouts.adminPannel')

@section('content')
	<div class="p-5">
		 <form method="POST" action="{{ route('admin.update', $res->id) }}">
			@csrf 
			{{ method_field('PUT') }}
		  <div class="form-group">
		    <label class="font-weight-bold h2" for="role">ROLE</label>
		    <select name="role" class="form-control" id="role">
		      <option value="{{ $res->role }}" selected class="text-primary">
		      	{{ $res->role }}
		      </option>
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
		    <input name="name" type="text" class="form-control" id="name_add" value="{{ $res->name }}" required>
		  </div>
		  <div class="form-group">
		    <label for="lastname_add">Last Name</label>
		    <input name="last_name" type="text" class="form-control" id="lastname_add" value="{{ $res->last_name }}">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Email address</label>
		    <input value="{{ $res->email }}" name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
		  </div>

		  <div class="form-group">
		    <label for="phone_add">Phone</label>
		    <input value="{{ $res->phone }}" name="phone" type="text" class="form-control" id="phone_add" placeholder="Optional">
		  </div>

		   <div class="form-group">
		    <label  for="regi_type">Registration type</label>
		    <select name="registration_type"  class="form-control" id="regi_type">
		      <option value="{{ $res->registration_type }}" selected class="text-primary">{{ $res->registration_type }}</option>
		      option
		      <option value="vdc">VDC</option>
		      <option value="external">External</option>
		    </select>
		  </div>


			<input name="image" type="hidden" value="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">	


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