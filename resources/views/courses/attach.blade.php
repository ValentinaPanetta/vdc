@extends('layouts.adminPannel')

@section('content')
<div class="m-4 p-4 bg-dark-t text-white">
	<div class="row d-flex justify-content-center p-2">
		<h3 class="font-weight-bold text-lightcyan">Skills</h3>
	</div>
	<div class="row d-flex justify-content-center p-2">
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
						'<div class="col-4 my-2">
						<form class="p-5 bg-white corners text-darkblue d-flex justify-content-center align-items-center" method="POST" action="';
				@endphp
						{{ route('courseToSkill.detach') }}
						
				@php echo'">'; 
				@endphp 
				@csrf
				{{ method_field('GET') }}
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
						<button type="submit" value="delete" class="btn-custom btn-custom-grey">
									  -
									</button>
									</div>
							</form>
						</div>';
				@endphp

			@endif
			@endif

		@endforeach


		
			@if($check == false )
				@php echo
						'<div class="col-4 my-2 ">
						<form class="p-5 bg-white corners text-darkblue d-flex justify-content-center align-items-center" method="POST" action="';
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
						<button type="submit" class="btn-custom btn-custom-blue">
									  +
									</button>
									</div>
							</form>
						</div>';
				@endphp

	 @endif
		@php
			}
		@endphp
	</div>
</div>
@endsection

