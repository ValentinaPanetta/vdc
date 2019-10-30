@extends('layouts.adminPannel')
@section('content')
<div class="d-flex justify-content-around ">
    <a href="{{ route('admin.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow " >Users List</div>
	</a>
	<a href="{{ route('admin.create')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow " >Create User</div>
	</a>
	<a href="{{ route('languages.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">Languages</div>
	</a>
	<a href="{{ route('jobProfiles.index')}}" >
   		<div class="bg-darkcyan-t p-2 text-white big_text shadow" >Job Profiles</div>
	</a>
	<a href="{{ route('skills.index')}}" >
        <div class="bg-darkcyan-t p-2 text-white big_text shadow" >Skills table</div>
    </a>
	<a href="{{ route('companies.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow" style="border: 3px solid white; text-shadow: 2px 2px #000024">COMPANIES table</div>
	</a>
</div>
	<div class="text-center">
		<h3 class="p-3 text-center text-white">Partner Companies</h3>
	    <a href="{{ route('companies.create')}}" >
			<button class="btn btn-success ">CREATE Company Profile</button>
		</a>
		<div class="text-mediumblue bg-darkcyan-t text-center ">
			<h1 class="mb-0 mt-4 border ">Companies:</h1>
		</div>
	</div>

		
	<table class="w-100 table table-striped table-bordered bg-dark-t text-white">
		
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