@extends('layouts.adminPannel')

@section('content')
<div class="d-flex justify-content-around p-3">
	<a href="{{ route('companies.index')}}" >
		<button class="btn btn-primary ">Back to Companies index</button>
	</a>
</div>
<h1 class="text-white text-center">Editing the selected company</h1>
	<div class="p-5 bg-dark-t text-white">
		 <form method="POST" action="{{ route('companies.update', $res->id) }}">
			@csrf 
			{{ method_field('PUT') }}
		  
		  <div class="form-group">
		    <label for="comp_name_add">Company Name</label>
		    <input name="company_name" type="text" class="form-control" id="name_add" value="{{ $res->company_name }}" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="comp_email">Email address</label>
		    <input value="{{ $res->company_email }}" name="company_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
		  </div>

		  <div class="form-group">
		    <label for="comp_phone_add">Phone</label>
		    <input value="{{ $res->company_phone }}" name="company_phone" type="text" class="form-control" id="phone_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_website">Website</label>
		    <input value="{{ $res->website }}" name="website" type="text" class="form-control" id="website_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="description">Description</label>
			    <textarea name="description" type="text" class="form-control" id="description" >
			    	{{ $res->description }}
			    </textarea> 
		  </div>

		  <div class="form-group">
		    <label for="comp_zip">ZIP Code</label>
		    <input value="{{ $res->zipCode }}" name="zipCode" type="text" class="form-control" id="zip_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_street">Street</label>
		    <input value="{{ $res->street }}" name="street" type="text" class="form-control" id="street_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_city">City</label>
		    <input value="{{ $res->city }}" name="city" type="text" class="form-control" id="city_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_country">Country</label>
		    <input value="{{ $res->country }}" name="country" type="text" class="form-control" id="country_add" placeholder="Optional">
		  </div>

		   
		  

		<div class="p-2">
			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		
		</form>
		
	</div>
@endsection