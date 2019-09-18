@extends('layouts.default')

@section('content')
	<div class="p-5">
		 <form method="POST" action="{{ route('account.update', $res->id) }}">
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
		    <label for="image">Profile Picture</label>
			<input name="image" type="text"  class="form-control" value="{{ $res->image }}">	
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