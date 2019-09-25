@extends('layouts.adminPannel')
@section('content')
<div class="d-flex justify-content-around">
	<a href="{{ route('skills.index')}}" >
		<button class="btn btn-primary ">Go Back</button>
	</a>
</div>
<div class="p-5 d-flex justify-content-center row">
	<form class="col-6" method="POST" action="{{ route('skills.store') }}">

		@csrf

		<div class="form-group">
		    <label for="name_add">Skill</label>
		    <input name="name" type="text" class="form-control" id="name_add" placeholder="Input the name of the skill" required>
		</div>

	<div class="p-2">
		<button type="submit" class="btn btn-primary">
		  save
		</button>
	</div>
	</form>
</div>
@endsection