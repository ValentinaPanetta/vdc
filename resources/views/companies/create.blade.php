@extends('layouts.adminPannel')

@section('content')
<div class="d-flex justify-content-around p-3">
	<a href="{{ route('companies.index')}}" >
		<button class="btn btn-primary ">Back to Companies index</button>
	</a>
</div>

<h1 class="text-center text-white">Create A New Company</h1>

	<div class="p-5 bg-dark-t text-white">
		 <form method="POST" action="{{ route('companies.store') }}">

			@csrf
			
		  <div class="form-group">
		    <label for="comp_name_add">Company Name</label>
		    <input name="company_name" type="text" class="form-control" id="name_add" placeholder="Name" required>
		  </div>
		  <div class="form-group">
		    <label for="comp_email_add">Email address</label>
		    <input name="company_email" type="email" class="form-control" id="email_add" placeholder="name@example.com" required>
		  </div> 
        
		  <div class="form-group">
		    <label for="comp_phone_add">Phone</label>
		    <input name="company_phone" type="text" class="form-control" id="phone_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_website">Website</label>
		    <input name="website" type="text" class="form-control" id="website_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="description">Description</label>
			    <textarea name="description" type="text" class="form-control" id="description" ></textarea> 
		  </div>

		  <div class="form-group">
		    <label for="zipCode">ZIP Code</label>
		    <input name="zipCode" type="text" class="form-control" id="zip_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_street">Street</label>
		    <input name="street" type="text" class="form-control" id="street_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_city">City</label>
		    <input name="city" type="text" class="form-control" id="city_add" placeholder="Optional">
		  </div>

		  <div class="form-group">
		    <label for="comp_country">Country</label>
		    <input name="country" type="text" class="form-control" id="country_add" placeholder="Optional">
		  </div>

		<div class="p-2">
			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		  
		</form>
		
	</div>
@endsection