@extends('layouts.default')

@section('content')

@foreach ($res as $res)
	{{-- expr --}}

	<div class="p-5 bg-dark-t text-white">
		 <form method="POST" action="{{ route('consultant.update', $res->id) }}">
			@csrf 
			{{ method_field('PUT') }}

		  <div class="form-group">
		    <label for="date_birth">Date of Birth</label>
		    <input name="date_birth" type="date" class="form-control" id="date_birth" value="{{ $res->date_birth }}">
		  </div>
		  <div class="form-group">
		    <label for="description">About You</label>
			    <textarea name="description" type="text" class="form-control" id="description" >
			    	{{ $res->description }}
			    </textarea> 
		  </div>		  		

		<div class="p-2">
			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		
		</form>
		
	</div>
@endforeach
@endsection