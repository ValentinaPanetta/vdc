@extends('layouts.adminPannel')
@section('content')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12 h2 text-center">Job Profiles</div>
        <div class="col-6 my-3 text-left">
            <a href="{{ route('admin.index') }}"><button type="submit" class="btn btn-primary text-light">Back
            </button></a>
        </div>
        <div class="col-6 my-3 text-right">
            <a href="{{ route('jobProfiles.create') }}">
            	<button type="submit" class="btn btn-primary text-light">Create New Profile
            	</button>
            </a>
        </div>
       	
		
		@foreach ($profiles as $profiles)
			<div class="col-md-4 col-sm-12 p-2" >
            	<div class="col-12 border border-info px-5 py-3" style="height: 100%;">
            		<div class="col-12 h4 mt-3 p-0" id="{{ $profiles->id }}">{{ $profiles->name }}</div>
            		<div class="col-12 p-0">{{ $profiles->importance }}</div>

    				<table class="col-12 p-0 mt-3">            						
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
							<button class="btn btn-index pointer">show</button>
						</a>
	            		<a href="{{ route('jobProfiles.edit', $profiles->id)}}">
							<button class="btn btn-primary text-white pointer">edit</button>
						</a>
						<form class="d-inline" method="POST" action="{{ route('jobProfiles.destroy', $profiles->id) }}">
							@csrf
							{{ method_field('DELETE') }}
						    
							<button type="submit" value="delete" class="btn btn-secondary text-white pointer d-inline" onclick="return confirm('Do you really want to delete this profile?')">delete</button>
						</form>
					</div>
            	</div>            	
            </div>
		@endforeach
	</div>
</div>

@endsection