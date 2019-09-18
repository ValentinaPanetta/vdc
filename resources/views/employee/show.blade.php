@extends('layouts.default')
 
@section('content')
<div class="d-flex justify-content-around">
	<a href="{{ url('account/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info">Edit Account</button>
	</a>

	<a href="{{ url('employee/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info">Edit Profile</button>
	</a>

</div>
	<hr>	
		<h2 class="text-primary">User Table</h2>
	<h3><small>Name:</small>  {{ $resUser->name}}</h3>
	<h3><small>Last Name:</small> {{ $resUser->last_name}}</h3>
	<h3><small>Gender:</small> {{ $resUser->gender}}</h3>
	<hr>

	<h2 class="text-primary">Employee Table</h2>
		@foreach ($res as $res)
			<h3>Date of Birth: {{ $res->date_birth }}</h3>
			<h3>Description: {{ $res->description }}</h3>
		@endforeach
		@foreach($company as $company)
		<h3>Company: {{ $company->company_name }}</h3>
		@endforeach
@endsection