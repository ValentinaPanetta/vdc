@extends('layouts.adminPannel')
@section('content')
<div class="d-flex justify-content-around mb-4">
    <a href="{{ route('courses.create')}}" >
		<button class="btn-custom btn-custom-blue">New Course</button>
	</a>
</div>
<div class="row">
	@foreach ($courses as $courses)
		<div class="col-4 my-3">
		<div class="card h-100">
		  <div class="card-body">
		    <h5 class="card-title text-darkblue">{{ $courses->name }}</h5>
		    <h6 class="card-subtitle mb-2 text-muted">Version: {{ $courses->version }}</h6>
		    <p class="card-text">{{ $courses->description }}</p>
		    @foreach($courses->courseLanguage()->get() as $language)
                <p class="card-text">{{$language->language_name}}</p>
            @endforeach
            <p class="card-text font-weight-bold text-darkblue">Skills:</p>
             @foreach($courses->courseToSkill()->get() as $skill)
                <p class="card-text">{{$skill->name}}<span class="small text-muted"> Level: {{$skill->pivot->lvl}}</span></p>
            @endforeach
		    <p class="card-text">Address: {{ $courses->street }} {{ $courses->city }} {{ $courses->zipCode }}, {{ $courses->country }}</p>
		    <p class="card-text">From: {{ date('d-m-Y',strtotime($courses->start_date)) }}</p>
		    <p class="card-text">To: {{ date('d-m-Y',strtotime($courses->end_date)) }}</p>
			@foreach($courses->courseCompany()->get() as $company)
                <p class="card-text">{{$company->company_name}}</p>
            @endforeach
            <div class="d-flex justify-content-start">
				<a href="{{ route('courses.edit', $courses->id)}}">
				<button class="btn-custom btn-custom-blue">edit</button>
				</a>
				<form method="POST" action="{{ route('courses.destroy', $courses->id) }}">
				@csrf
				{{ method_field('DELETE') }}
				    
				<button type="submit" value="delete" class="btn-custom btn-custom-grey mx-2" onclick="return confirm('Are you sure to delete?')">delete</button>
				</form>

				<a href="courses/{{ $courses->id }}" >
					<button class="btn btn-primary">show</button>
				</a>
			</div>
		  </div>
		</div>
		</div>
	@endforeach
</div>
@endsection