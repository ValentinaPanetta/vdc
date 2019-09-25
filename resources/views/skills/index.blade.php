@extends('layouts.adminPannel')
@section('content')
	<div class="d-flex justify-content-center my-3">
		<h3 class="text-darkblue">Skills</h3>
	</div>
	<div class="d-flex justify-content-around mb-4">
    <a href="{{ route('skills.create')}}" >
		<button class="btn-custom btn-custom-blue">add a skill</button>
	</a>
	</div>
<div class="d-flex justify-content-center">
	<table class="table col-6">
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Skill</th>
	      <th scope="col">Remove</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach ($skills as $skill)
	    <tr>
	      <th scope="row">{{ $skill->id}}</th>
	      <td>{{ $skill->name}}</td>
	      <td class="text-danger font-weight-bold">
			<form method="POST" action="{{ route('skills.destroy', $skill->id) }}">
			@csrf
			{{ method_field('DELETE') }}
			    
			<button type="submit" value="delete" class="bg-darkblue text-white pointer" onclick="return confirm('Are you sure to delete?')" style="border-radius: 100%; border:0; cursor: pointer;">X</button>
			</form>
			</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
</div>
	<div class="d-flex justify-content-around mb-4">
    <a href="{{ route('admin.index')}}" >
		<button class="btn btn-info">go back</button>
	</a>
	</div>
@endsection