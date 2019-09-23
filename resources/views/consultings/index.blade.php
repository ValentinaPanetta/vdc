@extends('layouts.default')

@section('content') 


	<div class="">
		<h1 class="text-center">Consultings</h1>
	</div>
	<div class="d-flex justify-content-around">
		<a href="{{ url('consultings/create') }}" >
			<button class="btn btn-success">Create a Consulting</button>
		</a>
	</div>
	<div class="row">
		@foreach ($res as $res)

			<div class="col-lg-4 p-2">
				<div class="border border-info pl-3 py-4 ">
					<a href="consultings/{{ $res->id }}"><h2 class="text-center text-info">{{ $res->title }}</h2></a>
					<hr>
					<h4><strong>Type: </strong>{{ $res->type }}</h4>
					<p><strong>When:</strong> {{ $res->consult_date }}</p>
					<p><strong>Where: </strong>
						{{ $res->city }},
						{{ $res->street }},
						{{ $res->zipCode }}
						{{ $res->country }}
					</p>
					<p><strong>Total Places: </strong>{{ $res->consult_limit }}</p>
		
					<p>
						<strong>Available Places: </strong>
						{{-- Available Places calculation	--}}
						<span class="availability">
							{{ $res->consult_limit - $res->consultingClient()->get()->count() }}
						</span>
					</p>
		

   {{--					
					@foreach($res->consultingClient()->get() as $client)
						<p>{{$client->name}}</p>
					@endforeach
	--}}			
					@if(Auth::user())
						@php ($in = false)
						@foreach($res->consultingClient()->get() as $client) 
							@if($client->email == Auth::user()->email)
								<h2 class="text-success">You are in!!!</h2>
								@php ($in = true)
							@endif
						@endforeach
						@if($in == false)
							<h2 class="text-success">Subscribe Now</h2>
						@endif
					@endif
						<h2 class="dinamic">Available</h2>
						
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
					<div class="d-flex justify-content-around">
						<div>
							<a href="consultings/{{ $res->id }}/edit"><button class="btn btn-primary">Edit</button></a>
						</div>
						<div>
							<form method="POST" action="{{ route('consultings.destroy', $res->id) }}">
							@csrf
							{{ method_field('DELETE') }} 
							<button type="submit" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" >Delete</button>
							</form>
						</div>
						
					</div>
					
				</div>

			</div>	
		@endforeach
	</div>


@endsection