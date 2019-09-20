@extends('layouts.adminPannel')
@section('content')
	<div class="d-flex justify-content-around">
	    <a href="{{ route('companies.create')}}" >
			<button class="btn btn-success ">CREATE Company</button>
		</a>
		<a href="{{ route('languages.index')}}" >
			<button class="btn btn-info ">Languages</button>
		</a>
		<a href="{{ route('admin.index')}}" >
			<button class="btn btn-primary ">USERS table</button>
		</a>
	</div>

		<h3 class="p-3 text-center text-dark">Partner Companies</h3>
	<table class="w-100 table table-striped table-bordered">
		
		<thead>
				<tr>
					<th>id</th>
					<th>Company Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Website</th>
					<th>ZIP Code</th>
					<th>Street</th>
					<th>City</th>					
					<th>Country</th>	
					<th>Created:</th>	
					<th>Updated:</th>	
					<th>EDIT</th>
					<th>DELETE</th>				
				</tr>
		</thead>
		<tbody>

		@foreach ($res as $res)
		
				<tr>
					<td>{{ $res->id }}</td>
					<td>{{ $res->company_name }}</td>
					<td>{{ $res->company_email }}</td>
					<td>{{ $res->company_phone }}</td>
					<td>{{ $res->website }}</td>
					<td>{{ $res->zipCode }}</td>
					<td>{{ $res->street }}</td>
					<td>{{ $res->city }}</td>
					<td>{{ $res->country }}</td>
					<td>{{ $res->created_at }}</td>
					<td>{{ $res->updated_at }}</td>
					<td class="text-success text-center font-weight-bold">
						<a href="{{ route('companies.edit', $res->id)}}">
							<button class="bg-success text-white pointer" style="border-radius: 100%; border:0; cursor: pointer;">O</button>
						</a>
					</td>
					<td class="text-danger text-center font-weight-bold">
						<form method="POST" action="{{ route('companies.destroy', $res->id) }}">
						@csrf
						{{ method_field('DELETE') }}
						    
						<button type="submit" value="delete" class="bg-danger text-white pointer" onclick="return confirm('Are you sure to delete?')" style="border-radius: 100%; border:0; cursor: pointer;">X</button>
						</form>
					</td>
				</tr>			
		
		@endforeach
	</tbody>
	</table>
@endsection