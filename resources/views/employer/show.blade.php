@extends('layouts.default')
 
@section('content')
<div class="bg-dark-t text-white">
	

<div class="d-flex justify-content-around ">
	<a href="{{ url('account/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info">Edit Account</button>
	</a>
</div>
	<hr>	
		<h2 class="text-primary">User Table -> EMPLOYER</h2>
	<h3><small>Name:</small>  {{ $resUser->name}}</h3>
	<h3><small>Last Name:</small> {{ $resUser->last_name}}</h3>
	<hr>

</div>
@endsection