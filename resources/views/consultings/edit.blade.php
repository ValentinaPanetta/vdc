@extends('layouts.adminPannel')

@section('content')
<div class="m-5 p-5 bg-dark-t text-white">
	
	<h1 class="text-center text-darkcyan">Edit</h1>
	<a href="{{ url('consultings/'.$res->id) }}">
		<button class="btn-custom btn-custom-cyan">Back to Course</button>
	</a>
		<div class="pt-3">
			 <form method="POST" action="{{ route('consultings.update', $res->id) }}">
				@csrf 
				{{ method_field('PUT') }}
			 <div class="form-group">
			    <label for="title">Title</label>
			    <input name="title" type="text" class="form-control" id="title"  required value="{{$res->title}}">
			  </div>
				
			  <div class="form-group">
			  	<label for="type" >Type</label>
			    <select name="type" class="form-control" id="type" required >
			      <option value="{{$res->type}}" selected>{{$res->type}}</option>
			      <option value="group">Group</option>
			      <option value="individual">Individual</option>
			      <option value="coaching">Coaching</option>
			    </select>
			  </div>


			  <div class="form-group">
			    <label for="duration">Duration in minutes</label>
			    <input name="duration" type="number" class="form-control" id="duration" placeholder="one hour and one half" required value="{{$res->duration }}">
			  </div>

			  <div class="form-group">
			    <label for="consult_limit">Max Number Of People</label>
			    <input name="consult_limit" type="number" class="form-control" id="consult_limit" 
			   min="1" required value="{{ $res->consult_limit}}">
			  </div>  
	        
			  <div class="form-group">
			    <label for="consult_date">Date</label>
			    <p class="text-lightcyan">It was {{ $res->consult_date }}</p>
			    <input name="consult_date" type="datetime-local" class="form-control" id="consult_date" required value="">
			  </div>
			  <hr>
			  <h4 class="text-center">Location</h4>
			  <div class="form-group">
			    <label for="country">Country</label>
			    <input name="country" type="text" class="form-control" id="country" placeholder="Optional" required value="{{ $res->country }}">
			  </div>

			  <div class="form-group">
			    <label for="city">City</label>
				    <input name="city" type="text" class="form-control" id="city"  required value="{{ $res->city}}">
			  </div>

			  <div class="form-group">
			    <label for="zipCode">ZIP Code</label>
			    <input name="zipCode" type="text" class="form-control" id="zipCode" placeholder="Optional" required value="{{ $res->zipCode }}">
			  </div>

			  <div class="form-group">
			    <label for="street">Street</label>
			    <input name="street" type="text" class="form-control" id="street" placeholder="Optional" required value="{{ $res->street }}">
			  </div>
			  <hr>
			  <h4 class="text-center">Consultant and Trainer</h4>
			  <div class="form-group">
			  	<label for="FK_consultant">Consultant</label>
			    <select name="FK_consultant" class="form-control" id="FK_consultant" required>
			      <option disabled selected>Select the Consultant</option>

				    @foreach($res->consultingConsultant()->get() as $sub)
						<option selected value="{{ $sub->id }}"> {{$sub->name}} {{$sub->last_name}}</option>
					@endforeach
				<!-- 	foreach -->
					@foreach ($conUser as $cons)
						<option value="{{ $cons->id }}">{{ $cons->name }} {{ $cons->last_name }}</option>
					@endforeach
			      
			    </select>
			  </div>
			  <div class="form-group">
			  	<label for="FK_trainer">Trainer</label>
			    <select name="FK_trainer" class="form-control" id="FK_trainer" >

			      @foreach($res->consultingTrainer()->get() as $sub)
						<option selected value="{{ $sub->id }}"> {{$sub->name}} {{$sub->last_name}}</option>
				  @endforeach
				<!-- 	foreach -->
			      @foreach ($trnUser as $trainer)
					<option value="{{ $trainer->id }}">{{ $trainer->name }} {{ $trainer->last_name }}</option>
				  @endforeach
			  
			    </select>
			  </div>


			<div class="p-2  text-center">
				<button type="submit" class="px-5 btn-custom btn-custom-cyan">
					save
				</button>
			</div>
			
			</form>
			
		</div>
</div>
@endsection