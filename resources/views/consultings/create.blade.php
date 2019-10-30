@extends('layouts.default')

@section('content')
<div class="m-5 bg-dark-t text-white">
	<div class="">
		<h1 class="pt-4 text-center text-darkcyan">Consulting Creation</h1>
	</div>
	<div class="pl-5 ">
		<a href="{{ url('consultings') }}" >
			<button class="btn-custom btn-custom-cyan"> <- Back to Consultings</button>
		</a>
	</div>



		<div class="p-5">
		 <form method="POST" action="{{ route('consultings.store') }}">

			@csrf

		<div class="form-group">
		    <label for="title">Title</label>
		    <input name="title" type="text" class="form-control" id="title"  required>
		  </div>
			
		  <div class="form-group">
		  	<label for="type" >Type</label>
		    <select name="type" class="form-control" id="type" required>
		      <option disabled selected>Select the type of Consulting</option>
		      <option value="group">Group</option>
		      <option value="individual">Individual</option>
		      <option value="coaching">Coaching</option>
		    </select>
		  </div>


		  <div class="form-group">
		    <label for="duration">Duration in minutes</label>
		    <input name="duration" type="number" class="form-control" id="duration" value="30" required>
		  </div>

		  <div class="form-group">
		    <label for="consult_limit">Max Number Of People</label>
		    <input name="consult_limit" type="number" class="form-control" id="consult_limit" 
		    value="1" min="1" required>
		  </div>  
        
		  <div class="form-group">
		    <label for="consult_date">Date</label>
		    <input name="consult_date" type="datetime-local" class="form-control" id="consult_date" required>
		  </div>
		  <hr>
		  <h4 class="text-center">Location</h4>
		  <div class="form-group">
		    <label for="country">Country</label>
		    <input name="country" type="text" class="form-control" id="country" placeholder="Optional" required>
		  </div>

		  <div class="form-group">
		    <label for="city">City</label>
			    <input name="city" type="text" class="form-control" id="city"  required>
		  </div>

		  <div class="form-group">
		    <label for="zipCode">ZIP Code</label>
		    <input name="zipCode" type="text" class="form-control" id="zipCode" placeholder="Optional" required>
		  </div>

		  <div class="form-group">
		    <label for="street">Street</label>
		    <input name="street" type="text" class="form-control" id="street" placeholder="Optional" required>
		  </div>
		  <hr>
		  <h4 class="text-center">Consultant and Trainer</h4>
		  <div class="form-group">
		  	<label for="FK_consultant">Consultant</label>
		    <select name="FK_consultant" class="form-control" id="FK_consultant" required>
		      <option disabled selected>Select the Consultant</option>
			<!-- 	foreach -->
			@foreach ($conUser as $cons)
				<option value="{{ $cons->id }}">{{ $cons->name }} {{ $cons->last_name }}</option>
			@endforeach
		      
		    </select>
		  </div>
		  <div class="form-group">
		  	<label for="FK_trainer">Trainer</label>
		    <select name="FK_trainer" class="form-control" id="FK_trainer" >
		      <option disabled selected>trainer is optional</option>
			<!-- 	foreach -->
		      @foreach ($trnUser as $trainer)
				<option value="{{ $trainer->id }}">{{ $trainer->name }} {{ $trainer->last_name }}</option>
			@endforeach
		  
		    </select>
		  </div>


		<div class="p-2 text-center">
			<button type="submit" class="px-5 btn-custom btn-custom-cyan">
				save
			</button>
		</div>
		  
		</form>
		
	</div>
</div>
@endsection