@extends('layouts.default')

@section('content') 
@include('consultings.search')
<div class="px-5 py-3 my-3" id="partners">
	<div class="">
		<h1 class="text-center text-lightcyan">Consultings</h1>
	</div>
	<div class="d-flex justify-content-around">
		@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'consultant')
			<a href="{{ url('consultings/create') }}" >
				<button class="btn-custom btn-custom-cyan my-2">Create a Consulting</button>
			</a>
		@endif
	</div>
	<div class="row">
		@foreach ($res as $res)
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-5">
			<div class=" bg-white p-2 corners cane" id="{{ $res->id }}" >

					
				
				<a href="consultings/{{ $res->id }}" class="text-darkblue">
				<div class="pl-3 py-4 h-100">
					<h2 class="text-center text-darkblue font-weight-bold">{{ $res->title }}</h2>
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
								<h4 class="text-lightcyan">You are in!!!</h4>
								@php ($in = true)
							@endif
						@endforeach
						@if($in == false)
							<h4 class="text-lightcyan">Subscribe Now</h4>
						@endif
					@endif
						<h4 class="text-darkcyan">Available</h4>
						
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
					@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'consultant')
						<div class="d-flex justify-content-around">
							<div>
								<a href="consultings/{{ $res->id }}/edit"><button class="btn-custom btn-custom-blue">Edit</button></a>
							</div>
							<div>
								<form method="POST" action="{{ route('consultings.destroy', $res->id) }}">
								@csrf
								{{ method_field('DELETE') }}
								<button type="submit" value="delete" class="btn-custom btn-custom-grey" onclick="return confirm('Are you sure to delete?')" >Delete</button>
								</form>
							</div>
							
						</div>
					@endif
					
				</div></a>

			</div>	</div>
		@endforeach
	</div>
</div>
@endsection