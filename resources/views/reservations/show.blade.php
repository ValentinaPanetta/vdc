@extends('layouts.default')
@section('content')

	<div class="container  shadow p-2 bg-dark-t my-3 text-white">
		<div class="p-3 shadow">
			<a href="{{ url('/courses').'/'.$res->id }}">
				<h2 class="text-center">{{$res->name}}</h2> 
			</a>
			
			@if ( $check == null)	
			<div>	<!-- form -->
				<hr class="">
				<h3 class=" text-right mt-5 pt-5">Amount Due: <strong>{{ $res->price }}</strong>€</h3>	
					<div>
					<form method="POST" action="{{ route('reservations.store')}}">
						@csrf
							<div class="py-1">
								<h4 class="text-center text-primary">Select the payment method</h4>
								<select name="pay_method" class="form-control m-2">
									<option value="Credit Card">Credit Card</option>
									<option value="Mastercard">Mastercard</option>
									<option value="Online Transfer">Online Transfer</option>
									<option value="Cash">Cash</option>
								</select>
							</div>
							<div class="py-1">
								<input type="hidden" name="price" value="{{ $res->price }}" class="form-control m-2">
								<input type="hidden" name="FK_client" value="{{ Auth::id() }}" >
								<input type="hidden" name="FK_course" value="{{ $res->id }}" >
							</div>
						<button type="submit" class="btn btn-success m-2">Pay</button>
					</form>
				</div>
			</div><!-- form -->
			@else
				<div>
					<hr>
					<h2 class="text-success">Status: to be confirmed </h2>
					<hr>
					<p class="text-center">Your payment is on the way, when we will have received we ll send you the confirmation and the invoice</p>
					<h2 class="text-success text-center p-4">Thank you</h2>
					<div class=" d-flex justify-content-between">
						<p class="p-2">Payment Date: {{ $check->created_at}}</p>
					    <p class="p-2">Payment method: {{  $check->pay_method }}</p>
					</div>
					
				</div>
			@endif
	</div>
	<div class=" ">
		<a href="{{ url('reservations') }}" class="bg-darkcyan-t p-2 rounded text-white">Go Back</a>
	</div>
@endsection



				