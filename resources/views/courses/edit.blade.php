@extends('layouts.adminPannel')
@section('content')
<div class="m-5 p-5 bg-dark-t text-white">
	<div class="h2 pb-2 text-center text-lightcyan">Edit Course</div>
	<div class="d-flex justify-content-around">
		<a href="{{ route('courses.index' )}}" >
			<button class="btn-custom btn-custom-cyan">Go Back</button>
		</a>
	</div>
	<div class="p-3">
		 <form method="POST" action="{{ route('courses.update', $courses->id) }}">
			{{ method_field('PUT') }}
			@csrf

			<div class="form-group">
			    <label for="name_add">Name</label>
			    <input name="name" type="text" class="form-control" id="name_add" placeholder="Course Name" value="{{ $courses->name }}" required>
			</div>

			<div class="form-group">
			    <label for="version">Version</label>
			    <input name="version" type="text" class="form-control" id="version" placeholder="Version" value="{{ $courses->version }}" required>
			</div>

			<div class="form-group">
		   		<label for="exampleFormControlTextarea1">Description</label>
		    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required>{{ $courses->description }}</textarea>
	  		</div>

			<div class="form-group">
				<label for="zipCode">ZIP Code</label>
				<input name="zipCode" type="text" class="form-control" id="zip_add" placeholder="ZipCode" value="{{ $courses->zipCode }} "required>
			</div>

			<div class="form-group">
				<label for="comp_street">Street</label>
				<input name="street" type="text" class="form-control" id="street_add" placeholder="Street" value="{{ $courses->street }}" required>
			</div>

			<div class="form-group">
				<label for="city">City</label>
				<input name="city" type="text" class="form-control" id="city_add" placeholder="City" value="{{ $courses->city }}" required>
			</div>

			<div class="form-group">
				<label for="country">Country</label>
				<input name="country" type="text" class="form-control" id="country_add" placeholder="Country" value="{{ $courses->country }}" required>
			</div>

			<div class="form-group">
			    <label for="course_limit">Course Limit</label>
			    <input name="course_limit" type="number" min="1" class="form-control" id="course_limit" placeholder="Course Limit" value="{{ $courses->course_limit }}" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Start Date</label>
				<p class="small text-muted">Previous date and time: {{ $courses->start_date }}</p>
				<input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="start_date" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">End Date</label>
				<p class="small text-muted">Previous date and time: {{ $courses->end_date }}</p>
				<input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="end_date" required>
			</div>

			<div class="form-group">
				<label for="type">Type</label>
				<input name="type" type="text" class="form-control" id="type_add" placeholder="Type" value="{{ $courses->type }}" required>
			</div>

			<div class="form-group">
				<label for="active_status">Active Status</label>
				<select name="active_status" class="form-control" id="active_status" required>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
			</div>

			<div class="form-group">
				<label for="price">Price</label>
				<input name="price" type="number" min="0" step="0.01" class="form-control" id="price_add" placeholder="Price" value="{{ $courses->price }}" required>
			</div>
	     
			<div class="form-group">
				<label for="FK_company">Company</label>
				<select name="FK_company" class="form-control" id="FK_company" required>
					@foreach ($companies as $companies)
	      			<option value="{{ $companies->id }}">{{ $companies->company_name }}</option>
	      			@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="FK_language">Language</label>
				<select name="FK_language" class="form-control" id="FK_language" required>
					@foreach ($languages as $languages)
	      			<option value="{{ $languages->id }}">{{ $languages->language_name }}</option>
	      			@endforeach
		        </select>
			</div>
		<div class="d-flex justify-content-around">
			<button type="submit" class="btn-custom btn-custom-cyan">
			  save
			</button>
		</div>
		</form>
	</div>
</div>
@endsection