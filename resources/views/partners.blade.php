@extends('layouts.default')
@section('content')	
<div class="px-5 py-3 mb-3" id="partners">
	<h3 class="p-3 text-center text-lightcyan">Partner Companies</h3>

	<div class="row">
		@foreach ($res as $res)
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 p-3" id="partners-container">
			<div class="col-12 p-3" id="box">
				<div id="partners-logo"><img class="img-fluid mb-5" src="{{ $res->logo }}"></div>
				<div class="h2 pt-3" id="{{ $res->id }}">{{ $res->company_name }}</div>
				<div> {{ str_limit($res->description, $limit = 150, $end = '...') }}</div>
				<div class="py-1"><b>Web : </b>{{ $res->website }}</div>
				{{-- <hr>
				<div class="h5"><b>Contact</b></div>
				<div><b>Tel: </b>{{ $res->company_phone }}</div>
				<div><b>Mail: </b>{{ $res->company_email }}</div>
				<br>
				<div class="h5"><b>Address</b></div>
				<div>{{ $res->street }}</div>
				<div>{{ $res->zipCode }} {{ $res->city }}</div>
				<div>{{ $res->country }}</div> --}}
				<div class="mt-3 text-center">
					<a href="{{ route('companies.show', $res->id) }}">
						<button class="btn-custom btn-custom-blue" type="submit">read more</button>
					</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>		
@endsection