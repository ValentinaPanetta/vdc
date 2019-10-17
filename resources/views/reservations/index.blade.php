@extends('layouts.default')
@section('content')
<div class="container">
<h3>You are in!</h3>
	<div class="border border-success p-3 my-2 row">
		
		@foreach ($paid as $paid)	
		@foreach ($paid->findCourse()->get() as $course)
		
				<div class="col-lg-4">
					<div class="">
						<div class="border border-primary p-2">
							<a href="{{ url('/courses').'/'.$paid->FK_course }}" title="">
								<h2>{{ $course->name }}</h2></a>
								<div>
									<hr>
									<p>Price: {{ $course->price }} €</p>
								</div>
								<div>
									<a href="{{ url('/reservations/'.$paid->FK_course )}}" >
										<button class="btn btn-success">Confirm</button>
									</a>
								</div>
						</div>
					</div>
				</div>	
		@endforeach
		@endforeach
	</div><h3>Your wish list</h3>
	<div class="border border-warning p-3 my-2 row">
		
		@foreach ($res as $res)	
		@foreach ($res->findCourse()->get() as $course)
		
				<div class="col-lg-4">
					<div class="">
						<div class="border border-primary p-2">
							<a href="{{ url('/courses').'/'.$res->FK_course }}" title="">
								<h2>{{ $course->name }}</h2></a>
								<div>
									<hr>
									<p>Price: {{ $course->price }} €</p>
								</div>
								<div>
									<a href="{{ url('/reservations/'.$res->FK_course )}}" >
										<button class="btn btn-success">Confirm</button>
									</a>
								</div>
								<div>
									<form method="POST" action="{{ route('ClientsToCourse.detach') }}">
						            @csrf
						            {{ method_field('GET') }}
						                <input type="hidden" name="FK_client" value="{{ Auth::user()->id }}">
						                <input type="hidden" name="FK_course" value="{{ $course->id }}">
						                <button type="submit" value="delete" class="btn-custom btn-custom-grey mr-2">unsubscribe</button>
						            </form>
								</div>
						</div>
					</div>
				</div>	
		@endforeach
		@endforeach
	</div>
	

</div>
@endsection
