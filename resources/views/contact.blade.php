@extends('layouts.default')

@section('content')
	<form class="p-5">
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
		<div>
			<button type="submit" class="btn btn-primary">Send</button>
		</div>
	</form>
@endsection