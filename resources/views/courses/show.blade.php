@extends('layouts.adminPannel')
@section('content')
<div class='row d-flex justify-content-center align-items-start p-4'>

    <div class='col-lg-6 col-md-6 col-sm-12 my-3'>
        <h5 class='text-blue'>{{ $courses->name }}</h5>
        <p>{{ $courses->version }}</p>
        <p>{{ $courses->description }}</p>
        <p>{{ $courses->type }}</p>
        <p>{{ $courses->address }}</p>
        <p class="text-darkblue">From: {{ date('d-m-Y',strtotime($courses->start_date)) }}</p>
		<p class="text-darkblue">To: {{ date('d-m-Y',strtotime($courses->end_date)) }}</p>
        @foreach($courses->courseCompany()->get() as $company)
                <p class="text-info">{{$company->company_name}}</p>
        @endforeach
        @foreach($courses->courseLanguage()->get() as $language)
                <p class="text-info">{{$language->language_name}}</p>
        @endforeach
        <p>Capacity: {{ $courses->course_limit }}</p>
    
   <div class="d-flex justify-content-start">
			<a href="{{ route('courses.edit', $courses->id)}}">
			<button class="btn-custom btn-custom-blue">edit</button>
			</a>
			<form method="POST" action="{{ route('courses.destroy', $courses->id) }}">
			@csrf
			{{ method_field('DELETE') }}
			    
			<button type="submit" value="delete" class="btn-custom btn-custom-grey mx-2" onclick="return confirm('Are you sure to delete?')">delete</button>
			</form>

			<a href="{{ route('courses.index' )}}" >
				<button class="btn btn-primary">Go Back</button>
			</a>

    </div>
	

</div>
@endsection