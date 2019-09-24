@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-lg-8">
				<div class="">
					<h1 class="text-center text-dark">{{ $res->title }}</h1>
					<hr>
				<div class="d-flex justify-content-around">

					<div>
						<a href="{{ url('consultings') }}"><button class="btn btn-primary">Back</button></a>
					</div>
					<div>
						<a href="{{ $res->id }}/edit"><button class="btn btn-success">Edit</button></a>
					</div>
					<div>
						<form method="POST" action="{{ route('consultings.destroy', $res->id) }}">
							@csrf
							{{ method_field('DELETE') }} 
							<button type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Delete</button>
						</form>
					</div>
				</div>
					
					<hr>

					<h4><strong>Type: </strong>{{ $res->type }}</h4>
					<h4><strong>Duration: </strong>{{ $res->duration }} minutes</h4>
					<p><strong>When:</strong> {{ $res->consult_date }}</p>
					<p><strong>Where: </strong>
						{{ $res->city }},
						{{ $res->street }},
						{{ $res->zipCode }}
						{{ $res->country }}
					</p>
					<p><strong>People Limit: </strong>{{ $res->consult_limit }}</p>
					<p>
						<strong>Available Places: </strong>
						{{-- Available Places calculation	--}}
						<span class="availability">
							{{ $res->consult_limit - $res->consultingClient()->get()->count() }}
						</span>
					</p>
					<p>
						@if(Auth::user())
						@foreach($res->consultingClient()->get() as $client)
							  
								@if($client->email == Auth::user()->email)
									<h5 class="text-success">You are in!!!</h5>
								@endif
							
						@endforeach
						@endif
					</p>
					<p>Consultant: 
						@foreach($res->consultingConsultant()->get() as $sub)
							<a href="{{ url('consultant/'.$sub->id) }}">{{$sub->name}} {{$sub->last_name}}</a>
						@endforeach
					</p>
					<p>Teacher: 
						@foreach($res->consultingTrainer()->get() as $sub)
							<a href="{{ url('employee/'.$sub->id) }}">{{$sub->name}} {{$sub->last_name}}</a>
						@endforeach
					</p>
				
				</div>
				<div class="border border-info d-flex justify-content-around p-3">
					<div>    
						@if(Auth::user())
							@php ($in = false)
							@foreach($res->consultingClient()->get() as $client)
								@if($client->email == Auth::user()->email )   {{--Check subscribtion--}}
									@php ($in = true)		
								@endif		
							@endforeach
{{-- If auth is NOT subscribed--}}
							@if($in == false)  
		{{-- If auth there is place yet--}}
								@if($res->consult_limit - $res->consultingClient()->get()->count() > 0)
									<form method="POST" action="{{ route('ClientToConsulting.attach') }}">                
									@csrf
									<input type="hidden" name="FK_client" value="{{ Auth::user()->id }}">
									<input type="hidden" name="FK_consulting" value="{{ $res->id }}">
									<button type="submit" value="delete" class="btn btn-success" onclick="return confirm('Are you sure to Subscribe?')" >Subscribe</button>
									</form>
								@else
									<h2 class="text-info">Sorry, we are full!!!</h2>
								@endif
							@else

								<form method="POST" action="{{ route('ClientsToConsulting.detach') }}">
								@csrf
								{{ method_field('GET') }}
								
								<input type="hidden" name="FK_client" value="{{ Auth::user()->id }}">
								<input type="hidden" name="FK_consulting" value="{{ $res->id }}">
								<button type="submit" value="delete" class="btn btn-danger " >Unsubscribe</button>
								</form>
							
							@endif


						@else
							<div class="text-success">
								<h3>Log in if you want to subscribe!!!</h3>
							</div>
						@endif
					</div>
				</div>
			</div>
			<div class="col-lg-4 text-center "> <!-- participants right pannel -->
				<h2 class="text-info">Participants</h2>
				<div class="row d-flex justify-content-center">
				@if(Auth::user())  
					@foreach($res->consultingClient()->get() as $client)
	{{--If the current user has already subscribed show his/her pictures on the first place--}}
						@if($client->email == Auth::user()->email)
							<div class="col-12 row d-flex justify-content-center">
								<div class="col-4 p-1">

								  	<div class="border border-success">
								  		<h5 class="text-success">It's me</h5>
									   	<div>
										 	<img src="{{$client->image}}"  class="w-100">
									   	</div>

										<h4 class="text-success">{{$client->name}}</h4>
								  	</div>
								</div>
							</div>

						@endif							
					@endforeach
					@foreach($res->consultingClient()->get() as $client)
						@if($client->email != Auth::user()->email)
							<div class="col-3 p-1">
								<a href="{{ url('client/'.$client->id) }}" >
								  	<div class="border border-info">
									   	<div>
										 	<img src="{{$client->image}}" class="w-100">
									   	</div>
										<h4>{{$client->name}}</h4>
								  	</div>
								</a>
							</div>
						@endif	
					@endforeach
				@endif
				</div>
			</div>
	</div>
@endsection