@extends('layouts.default')
@section('content')	
<div class="container">
	<h3 class="p-3 text-center text-dark">Partner Companies</h3>

	<div class="row">
		@foreach ($res as $res)
		<div class=" col-md-4  col-sm-12 p-3">
			<div class="col-12 border rounded border-radius p-3">
				<div class="h2" id="{{ $res->id }}">{{ $res->company_name }}</div>
				<div> {{ str_limit($res->description, $limit = 100, $end = '...') }}</div>
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
		@endforeach
	</div>
</div>		
@endsection