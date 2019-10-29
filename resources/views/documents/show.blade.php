@extends('layouts.default')

@section('content')
@if($user->id == Auth::user()->id)
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
	<div class="shadow bg-darkcyan-t  p-2"  style="border: 2px solid rgb(78,193,224)">
		<a  class="p-5 text-white"href="{{ url('documents/'.Auth::user()->id)}}" >
		Documents
		</a>
	</div>
	<div class="shadow bg-darkcyan-t  p-2">
		<a  class="p-5 text-white"href="{{ url('reservations/')}}" >
		My Courses
		</a>
	</div>
</div>
@endif


<div class="container shadow p-2 bg-dark-t my-3 ">
	<h2 class="text-center text-white p-1">{{ $user->name }} files</h2>
	<a href="{{ route('documents.create') }}">
	<button class="btn btn-success my-2">Add New</button>
</a>

	<table class="table table-bordered">
	<tr>
		<td><strong class="text-white">File Name</strong></td>
		<td><strong class="text-white">Created_at</strong></td>
		<td><strong class="text-white">Show Doc</strong></td>
		<td><strong class="text-white">Delete file</strong></td>
	</tr>
	@foreach ($res as $res)
	<tr>
		<td>
			<h4 class="text-white">{{ $res->name }} </h4>  
		</td>
		<td>
			<span class="text-purple">{{ $res->created_at }}</span>
			
		</td>
		<td>
			<a href="{{$res->path}}" target="_blank">
				<button class="btn btn-success">O</button>
			</a>
		</td>
		<td>
			<form method="POST" action="{{ route('documents.destroy', $res->id) }}">
				{{ method_field('DELETE') }}
				@csrf
			 	<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">X</button>
			</form> 
		</td>

	</tr>
	@endforeach
</table>
</div>

@endsection

