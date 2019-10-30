@extends('layouts.default')
@section('content')	
<div class="px-5 py-3 mb-3" id="partners">
	<h3 class="p-3 text-center text-lightcyan">{{ $res->company_name }}</h3>

	<div class="row mb-3 d-flex justify-content-center">		
		<div class="col-lg-8 col-md-10 col-sm-12 p-3" id="box">
			<div class="col-12 p-3">				
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