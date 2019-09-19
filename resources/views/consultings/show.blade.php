@extends('layouts.default')

@section('content')
	<div class="">
		<div class="">
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
				
				</div>
			</div>
			
	</div>
@endsection