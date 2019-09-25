@extends('layouts.adminPannel')

@section('content')

@php
for($i=0; $i<count($skills); $i++){
	$sk = $skills[$i]->id;
	$check = false;
@endphp
	
	@foreach($course->courseToSkill as $res)

		@if($res->pivot->FK_skill == $sk)	

		@php
		$check = true;
		@endphp	
	
		@if($check == true )
			@php echo
					'<form class="p-5" method="POST" action="';
			@endphp
					{{ route('courseToSkill.attach') }}
					
			@php echo'">'; 
			@endphp 
			@csrf 
			@php echo'
					<div class="form-check my-3">
					<input class="form-control" type="hidden" name="FK_skill" id="exampleRadios1" 
					value="'.$skills[$i]->id.'" multiple>
					<input type="hidden" name="FK_course" value="'.$FK_course.'">
					
					 <label class="form-check-label" for="exampleRadios1">
					   '.$skills[$i]->name.'
					 </label>
					 <select class="form-group" name="lvl">
						<option value="1">beginner</option>
						<option value="2">intermediate</option>
						<option value="3">advanced</option>

					</select>
					<button type="submit" class="btn btn-danger">
								  -
								</button>
								</div>
						</form>';
			@endphp

		@endif
		@endif

	@endforeach


	
		@if($check == false )
			@php echo
					'<form class="p-5" method="POST" action="';
			@endphp
					{{ route('courseToSkill.attach') }}
					
			@php echo'">'; @endphp @csrf @php echo'
					<div class="form-check my-3">
					<input class="form-control" type="hidden" name="FK_skill" id="exampleRadios1" 
					value="'.$skills[$i]->id.'" multiple>
					<input type="hidden" name="FK_course" value="'.$FK_course.'">
					
					 <label class="form-check-label" for="exampleRadios1">
					   '.$skills[$i]->name.'
					 </label>
					 <select class="form-group" name="lvl">
						<option value="1">beginner</option>
						<option value="2">intermediate</option>
						<option value="3">advanced</option>

					</select>
					<button type="submit" class="btn btn-primary">
								  +
								</button>
								</div>
						</form>';
			@endphp

 @endif
	@php
		}
	@endphp

@endsection

