@extends('layouts.adminPannel')
@section('content')
<div class="d-flex justify-content-around">
	<a href="{{ route('languages.index')}}" >
		<button class="btn btn-info text-darkblue">Back to Language index</button>
	</a>
</div>
<div class="p-5 d-flex justify-content-center row bg-dark-t text-white big_text mt-5">
	<form class="col-6" method="POST" action="{{ route('languages.store') }}">

		@csrf

		<div class="form-group">
		    <label for="name_add">Language</label>
		    <input name="language_name" type="text" class="form-control" id="name_add" placeholder="Input the name of the language" required>
		</div>

	<div class="p-2">
		<button type="submit" class="btn btn-primary">
		  save
		</button>
	</div>
	</form>
</div>
@endsection