@extends('layouts.default')

@section('content')
<div class="">
	<div class="">
		<h1 class="p-2 text-darkblue text-center">Confirm Unsubscription</h1>
	</div>
	<h2 class="text-center text-darkblue py-5">Are you sure you want to unsubscribe from this course?</h2>
	<div class="d-flex justify-content-around">
		<div>
			<a href="{{ url('../courses/'.$course) }}">
				<button class="btn-custom btn-custom-grey">Cancel</button>
			</a>
		</div>
		<div>
			<form method="POST" action="{{ route('ClientsToCourse.delete', $row) }}">
				@csrf
				{{ method_field('DELETE') }} 
				<button type="submit" value="delete" class="btn-custom btn-custom-blue" onclick="return confirm('Are you sure?')">Yes</button>
			</form>
		</div>
	</div>
</div>
@endsection