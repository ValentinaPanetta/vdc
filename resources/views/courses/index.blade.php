@extends('layouts.adminPannel')
@section('content')
@include('courses.search')
{{-- guest --}}
@guest
<div class="px-5 py-3 mb-3" id="partners">
	<h3 class="p-3 text-center text-lightcyan">Courses</h3>
	<div class="row">
		@foreach ($courses as $courses)
		<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3 cane" id="{{$courses->id}}">
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
			  </div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endguest


{{-- user authenticated --}}
@auth
<div class="d-flex justify-content-around mb-4">
	@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'course_provider')
	    <a href="{{ route('courses.create')}}" >
			<button class="btn-custom btn-custom-blue">New Course</button>
		</a>
	@endif
</div>
<div class="px-5 py-3 mb-3" id="partners">
	<h3 class="p-3 text-center text-lightcyan">Courses</h3>

	<div class="row">
		@foreach ($courses as $courses)
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 my-3 cane" id="{{$courses->id}}">
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
	            	@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'course_provider')
						<a href="{{ route('courses.edit', $courses->id)}}">
						<button class="btn-custom btn-custom-blue">edit</button>
						</a>
						<form method="POST" action="{{ route('courses.destroy', $courses->id) }}">
						@csrf
						{{ method_field('DELETE') }}
						    
						<button type="submit" value="delete" class="btn-custom btn-custom-grey mx-2" onclick="return confirm('Are you sure to delete?')">delete</button>
						</form>
					@endif
					<a href="courses/{{ $courses->id }}" >
						<button class="btn-custom btn-custom-blue">show</button>
					</a>
				</div>
			  </div>
			</div>
			</div>
		@endforeach
	</div>
</div>
@endauth
@endsection