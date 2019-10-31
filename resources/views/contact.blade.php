@extends('layouts.default')

@section('content')
<div class="p-5 m-5 bg-dark-t text-white">
	<div class="h2 text-center text-lightcyan">Contact</div>
	<form class="p-2">
		<div class="form-group">
		<label for="exampleFormControlInput1">Email</label>
		<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
		</div>
		<div class="form-group">
		<label for="exampleFormControlSelect1">Betreff</label>
		<select class="form-control" id="exampleFormControlSelect1" required>
		  <option>Hi </option>
		  <option>Lorem</option>
		  <option>Ipsum</option>
		</select>
		</div>	
		<div class="form-group">
		<label for="exampleFormControlTextarea1">Nachricht</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea required>
		</div>
		<div class="pt-3 d-flex justify-content-center">
			<button type="submit" class="btn-custom btn-custom-cyan">Send</button>
		</div>
	</form>
</div>
@endsection