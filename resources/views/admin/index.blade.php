@extends('layouts.adminPannel')
@section('content')

<div class="d-flex justify-content-around ">
    <a href="{{ route('admin.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow " 
		style="border: 3px solid white; text-shadow: 2px 2px #000024">Users List</div>
	</a>
	<a href="{{ route('admin.create')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow " >Create User</div>
	</a>
	<a href="{{ route('languages.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">Languages</div>
	</a>
	<a href="{{ route('jobProfiles.index')}}" >
   		<div class="bg-darkcyan-t p-2 text-white big_text shadow">Job Profiles</div>
	</a>
	<a href="{{ route('skills.index')}}" >
        <div class="bg-darkcyan-t p-2 text-white big_text shadow">Skills table</div>
    </a>
	<a href="{{ route('companies.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">COMPANIES table</div>
	</a>
</div>
	

	<h3 class="p-3 mb-0 mt-3 border text-center text-mediumblue bg-darkcyan-t">Users List</h3>
	<table class="w-100 table table-striped table-bordered bg-dark-t text-white">
		
		<thead>
				<tr>
					<th>id</th>
					<th>ROLE</th>
					<th>Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Reg Type</th>
					<th>Created</th>					
					<th>Updated</th>	
					<th>Show</th>
					<th>EDIT</th>
					<th>DELETE</th>				
				</tr>
		</thead>
		<tbody>

		@foreach ($res as $res)
		
				<tr>
					<td>{{ $res->id }}</td>
					<td>{{ $res->role }}</td>
					<td>{{ $res->name }}</td>
					<td>{{ $res->last_name }}</td>
					<td>{{ $res->email }}</td>
					<td>{{ $res->phone }}</td>
					<td>{{ $res->gender }}</td>
					<td>{{ $res->registration_type }}</td>
					<td>{{ $res->created_at }}</td>
					<td>{{ $res->updated_at }}</td>
					<td>

					@switch ($res->role) 
			            @case("client")
			                <a href="/client/{{$res->id}}">
			                @break;
			            @case("trainer")
			             	<a href="/employee/{{$res->id}}">
			            	@break;
			            @case("consultant")
			            	<a href="/consultant/{{$res->id}}"> 
			                @break;
			            @case("course_provider")
			                <a href="/employee/{{$res->id}}"> 
			             	@break;
			            @case("off_admin")
			            	<a href="/officeadmin/{{$res->id}}"> 
			                @break;
			            @case("employer")
			                <a href="/employer/{{$res->id}}"> 
			                @break;
			        @endswitch
			        <button class="btn btn-primary">Go</button>
        		</a>
					</td>
					<td class="text-success text-center font-weight-bold">
						<a href="{{ route('admin.edit', $res->id)}}">
							<button class="bg-success text-white pointer" style="border-radius: 100%; border:0; cursor: pointer;">O</button>
						</a>
					</td>
					<td class="text-danger text-center font-weight-bold">
						<form method="POST" action="{{ route('admin.destroy', $res->id) }}">
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