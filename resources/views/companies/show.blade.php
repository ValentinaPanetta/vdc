@extends('layouts.default')
@section('content')	
<div class="container">
	<h3 class="p-3 text-center text-dark">{{ $res->company_name }}</h3>

	<div class="row">		
		<div class="col-12 p-3">
			<div class="col-12 border rounded p-3">				
				<div class="my-3"> {{ $res->description }}</div>
				<div><b>Web : </b>{{ $res->website }}</div>
				<hr>
				<div class="h5"><b>Contact</b></div>
				<div><b>Tel: </b>{{ $res->company_phone }}</div>
				<div><b>Mail: </b>{{ $res->company_email }}</div>
				<br>
				<div class="h5"><b>Address</b></div>
				<div>{{ $res->street }}</div>
				<div>{{ $res->zipCode }} {{ $res->city }}</div>
				<div>{{ $res->country }}</div>
			</div>
		</div>		
	</div>
</div>		
@endsection