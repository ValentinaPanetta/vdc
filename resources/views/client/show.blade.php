@extends('layouts.default')
 
@section('content')
<!-- <h3 class="text-secondary text-center pb-3">User</h3> -->
<div class="d-flex justify-content-around ">
	
		@switch(Auth::user()->role) 
                @case('client')
                    <div class="shadow bg-darkcyan-t p-2" style="border: 2px solid rgb(78,193,224)">
                         <a class="p-5 text-white" href="{{ url('client/'.Auth::user()->id) }}">My Profile</a>
                    </div>
                @break
                @case('consultant')
                    <div class="shadow bg-darkcyan-t p-2" style="border: 2px solid rgb(78,193,224)">
                         <a class="p-5 text-white" href="{{ url('consultant/'.Auth::user()->id) }}">My Profile</a>
                    </div>
                @break
                @case('trainer')
                    <div class="shadow bg-darkcyan-t p-2" style="border: 2px solid rgb(78,193,224)">
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    </div>
                @break
                @case('course_provider')
                    <div class="shadow bg-darkcyan-t p-2" style="border: 2px solid rgb(78,193,224)">
                         <a class="p-5 text-white" href="{{ url('employee/'.Auth::user()->id) }}">My Profile</a>
                    </div>
                @break
        @endswitch
	
	<div class="shadow bg-darkcyan-t  p-2">
		<a class="p-5 text-white" href="{{ url('account/'.$resUser->id.'/edit')}}" >
		Edit Account
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('client/'.$resUser->id.'/edit')}}" >
		Edit Profile
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('documents/'.$resUser->id)}}" >
		Documents
		</a>
	</div>
	@if(Auth::user()->id == $resUser->id)
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('reservations/')}}" >
		My Courses
		</a>
	</div>
	@endif
</div>
	<hr>
<div class="row d-flex justify-content-center my-4 bg-dark-t text-white">	
	<div class="col-6 shadow p-3 m-2">	
		<h2 class="text-primary text-center">{{ $resUser->name}} {{ $resUser->last_name}}</h2>
		<div class="row d-flex justify-content-center">
			<div class="col-lg-6 ">
				<img src="{{ $resUser->image}}" alt="" class="img-fluid">
			</div>
			<div class="col-lg-12">
				@foreach ($res as $res)
				@if($res->description != null)
				<h5 class="p-2">About Me</h5>
				<p class="pb-3"> {{ $res->description }}</p>
				@endif
				<hr>
				<p>Date of Birth: {{ date('d-m-Y', strtotime($res->date_birth)) }}</p>
				<p>Website: {{ $res->website }}</p>
			@endforeach
			</div>
		</div>
</div>
</div>
<!-- Comment Section -->
@if(Auth::user()->id != $resUser->id)
	@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'trainer' OR Auth::user()->role == 'course_provider' OR Auth::user()->role == 'consultant')

	<div class="row d-flex justify-content-center flex-column align-items-center bg-darkcyan-t py-4">
		<div class="col-6 mb-3">
			<form method="POST" action="{{ route('comments.store') }}">
			@csrf
				<h3 class="text-white">Write a Note</h3>
				<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
				<input type="hidden" name="FK_subject" value="{{ $resUser->id }}" >
				<textarea name="content" class="w-100"></textarea >
				<div class="text-right">
					<button type="submit" class="btn btn-primary text-right">Send</button>
				</div>
			</form>
		</div>
		<div class="col-6">
		@foreach ($resUser->comment()->orderBy('created_at', 'desc')->get() as $comment)
			<div class="alert alert-primary d-flex flex-column" role="alert">
				@if(Auth::user()->id == $comment->FK_author OR Auth::user()->role == 'sys_admin')
				<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
		            {{ method_field('DELETE') }}
		            @csrf
	                <div class="text-right">
	                	<button type="submit" class="btn btn-sm btn-link text-decoration-none text-danger" onclick="return confirm('Are you sure to delete?')">x</button>
	                </div>
				</form>
				@endif
			  {{ $comment->content }}
			@foreach($comment->author()->get() as $author)
			  <small class="text-right"><span class="text-left small">{{ $comment->created_at }}</span> {{ $author->name }}</small>
			@endforeach
			</div>
		@endforeach
		</div>
	</div>
	@endif
@endif

@endsection