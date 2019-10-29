@extends('layouts.default')
@section('content')
<div class="d-flex justify-content-around ">
	<div class="shadow bg-darkcyan-t p-2" >
		@switch(Auth::user()->role) 
                @case('client')
                    
                         <a class="p-5 text-white" href="{{ url('client/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('consultant')
                    
                         <a class="p-5 text-white" href="{{ url('consultant/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('trainer')
                    
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
                @case('course_provider')
                    
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    
                @break
        @endswitch
	</div>
	<div class="shadow bg-darkcyan-t  p-2" >
		<a class="p-5 text-white" href="{{ url('account/'.Auth::user()->id.'/edit')}}" >
		Edit Account
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('client/'.Auth::user()->id.'/edit')}}" >
		Edit Profile
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2" >
		<a  class="p-5 text-white"href="{{ url('documents/'.Auth::user()->id)}}" >
		Documents
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2"  style="border: 2px solid rgb(78,193,224)">
		<a  class="p-5 text-white"href="{{ url('reservations/')}}" >
		My Courses
		</a>
	</div>
</div>

<div class="container shadow p-2 bg-dark-t my-3 text-white">
<h3>You are in!</h3>
	<div class="p-3 my-2 row">
		
		@foreach ($paid as $paid)	
		@foreach ($paid->findCourse()->get() as $course)
		
				<div class="col-lg-4">
					<div class="">
						<div class="border border-primary p-2 bg-mint-t">
							<a href="{{ url('/courses').'/'.$paid->FK_course }}" title="">
								<h2 class="text-Dpurple">{{ $course->name }}</h2></a>
								<div>
									<hr>
									<p>Price: {{ $course->price }} €</p>
								</div>
								<div>
									<a href="{{ url('/reservations/'.$paid->FK_course )}}" >
										<button class="btn btn-success">See Status</button>
									</a>
								</div>
						</div>
					</div>
				</div>	
		@endforeach
		@endforeach
	</div><h3>Your wish list</h3>
	<div class=" p-3 my-2 row">
		
		@foreach ($res as $res)	
		@foreach ($res->findCourse()->get() as $course)
		
				<div class="col-lg-4">
					<div class="">
						<div class="border border-primary p-2 bg-achtung ">
							<a href="{{ url('/courses').'/'.$res->FK_course }}" title="">
								<h2 class="text-white">{{ $course->name }}</h2></a>
								<div>
									<hr>
									<p>Price: {{ $course->price }} €</p>
								</div>
								<div class="d-flex justify-content-between">
									<div class="">
										<a href="{{ url('/reservations/'.$res->FK_course )}}" >
											<button class="btn btn-success">Confirm</button>
										</a>
										</div>
									<div class="">
										<form method="POST" action="{{ route('ClientsToCourse.detach') }}">
							            @csrf
							            {{ method_field('GET') }}
							                <input type="hidden" name="FK_client" value="{{ Auth::user()->id }}">
							                <input type="hidden" name="FK_course" value="{{ $course->id }}">
							                <button type="submit" value="delete" class="btn-custom btn-custom-grey mr-2">Cancel</button>
							            </form>
									</div>
								</div>
								
						</div>
					</div>
				</div>	
		@endforeach
		@endforeach
	</div>
	

</div>
@endsection
