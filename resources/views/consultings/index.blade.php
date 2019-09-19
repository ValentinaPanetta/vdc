@extends('layouts.default')

@section('content') 
@foreach ($user as $user)
	{{-- expr --}}{{ $user->name }}
@endforeach

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
				<div class="border border-info pl-3 py-4">
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
					<p><strong>People Limit: </strong>{{ $res->consult_limit }}</p>
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