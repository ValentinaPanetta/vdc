@extends('layouts.adminPannel')
@section('content')
<div class="d-flex justify-content-around">
    <a href="{{ route('admin.create')}}" >
		<button class="btn btn-success ">CREATE User</button>
	</a>
	<a href="{{ route('languages.index')}}" >
		<button class="btn btn-info ">Languages</button>
	</a>
	<a href="{{ route('jobProfiles.index')}}" >
   		<button class="btn-custom btn-custom-blue">Job Profiles</button>
	</a>
	<a href="{{ route('skills.index')}}" >
        <button class="btn-custom btn-custom-blue ">Skills</button>
    </a>
	<a href="{{ route('companies.index')}}" >
		<button class="btn btn-primary ">COMPANIES table</button>
	</a>
</div>
	

		<h3 class="p-3 text-center text-dark">Users List</h3>
	<table class="w-100 table table-striped table-bordered">
		
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