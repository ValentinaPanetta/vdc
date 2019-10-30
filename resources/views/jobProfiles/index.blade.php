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
   		<div class="bg-darkcyan-t p-2 text-white big_text shadow" 
		style="border: 3px solid white; text-shadow: 2px 2px #000024">Job Profiles</div>
	</a>
	<a href="{{ route('skills.index')}}" >
        <div class="bg-darkcyan-t p-2 text-white big_text shadow">Skills table</div>
    </a>
	<a href="{{ route('companies.index')}}" >
		<div class="bg-darkcyan-t p-2 text-white big_text shadow">COMPANIES table</div>
	</a>
</div>
<div class="col-12 h2 text-center text-white mt-4">Job Profiles</div>
<div class=" text-white text-center mt-4">
    <a href="{{ route('jobProfiles.create') }}">
    	<button type="submit" class="btn-custom btn-custom-blue text-light border">Create New Job Profile
    	</button>
    </a>
</div>
<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
	@foreach ($profiles as $profiles)
			<div class="col-md-4 col-sm-12 p-2" >
            	<div class="col-12 border border-secondary rounded px-5 py-1 bg-white" style="height: 100%;">
            		<div class="col-12 h4 mt-3 p-0" id="{{ $profiles->id }}">{{ $profiles->name }}</div>
            		<div class="col-12 p-0">{{ $profiles->importance }}</div>

    				<table class="col-12 p-0 mt-1">            						
						<thead>
							<tr>
								<th>Skills</th>
								<th>min-lvl</th>
								<th>max-lvl</th>
							</tr>
						</thead>
						<tbody>
						@foreach($profiles->profileToSkills()->get() as $skill)        					
							<tr>
								<td>{{ $skill->name }}</td>
								<td>{{ $skill->pivot->min_level }}</td>
								<td>{{ $skill->pivot->max_level }}</td>								
							</tr>
						@endforeach	
						</tbody>
					</table>
            		
					<div class="col-12 p-0 my-3">
						<a href="{{ route('jobProfiles.show', $profiles->id) }}">
							<button class="btn-custom btn-custom-grey pointer">show</button>
						</a>
	            		<a href="{{ route('jobProfiles.edit', $profiles->id)}}">
							<button class="btn btn-secondary text-white pointer">edit</button>
						</a>
						<form class="d-inline" method="POST" action="{{ route('jobProfiles.destroy', $profiles->id) }}">
							@csrf
							{{ method_field('DELETE') }}
						    
							<button type="submit" value="delete" class="btn-custom btn-custom-blue text-white pointer d-inline" onclick="return confirm('Do you really want to delete this profile?')">delete</button>
						</form>
					</div>
            	</div>            	
            </div>
		@endforeach
	</div>
</div>

@endsection