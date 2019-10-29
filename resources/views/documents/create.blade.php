@extends('layouts.default')

@section('content')
		 <form method="POST" action="{{ route('documents.store') }}"  enctype="multipart/form-data" class="bg-dark-t my-3 text-white p-3" >
			@csrf 

		  <div class="form-group">
		    <label for="name">File Name</label>
		    <input name="name" type="text" class="form-control" id="name" placeholder="file name" required>
		  </div>
		 
		
		  <div class="form-group">
    			<div for="image">Profile Picture</div>
    			<input type="file" class="btn btn-success "  name="path" >
		  </div>
		

			@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin')    {{--ONLY sys_admin and off_admin --}}
				
				<select name="FK_user" class="form-control" required>
					<option disabled selected>SELECT</option>
					@foreach ($res as $res)
						<option value="{{ $res->id }}">Client: {{ $res->id }}, Name: {{ $res->name }}, Email:{{ $res->email }}</option>
					@endforeach
				</select>
			@else
				<input type="hidden"  name="FK_user" value="{{ Auth::user()->id }}">
			@endif
          

		  <div class="p-2">

			<button type="submit" class="btn btn-primary">
				save
			</button>
		</div>
		
		</form>
@endsection