@extends('layouts.default')

@section('content')

<h2 class="text-center p-4">{{ $user->name}} files</h2>
<div class="container shadow p-2">
	<a href="{{ url('documents/create') }}">
	<button class="btn btn-success my-2">Add New</button>
</a>

	<table class="table table-bordered">
	<tr>
		<td><strong>File Name</strong></td>
		<td><strong>Created_at</strong></td>
		<td><strong>Show Doc</strong></td>
		<td><strong>Delete file</strong></td>
	</tr>
	@foreach ($res as $res)
	<tr>
		<td>
			<h4 class="text-dark">{{ $res->name }} </h4>  
		</td>
		<td>
			{{ $res->created_at }}
		</td>
		<td>
			<a href="{{$res->path}}" target="_blank">
				<button class="btn btn-success">O</button>
			</a>
		</td>
		<td>
			<form method="POST" action="{{ route('documents.destroy', $res->id) }}">
				{{ method_field('DELETE') }}
				@csrf
			 	<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">X</button>
			</form> 
		</td>

	</tr>
	@endforeach
</table>
</div>

@endsection

