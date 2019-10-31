@extends('layouts.adminPannel')
@section('content')
<div class="container-fluid mb-5">
    <div class="row m-3 p-4 bg-dark-t justify-content-center">
        <div class="col-12 h2 text-center text-lightcyan">
            @foreach($job->jobProfile()->get() as $profile)
                {{$profile->name}}
            @endforeach
        </div>
        <div class="col-md-11">
            <div class="form-group row">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <a href="{{ route('job.index') }}">
                        <button type="submit" class="btn-custom btn-custom-cyan">
                        Go Back
                    </button></a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                	@foreach($job->jobProfile()->get() as $profile)
						{{$profile->name}}
					@endforeach
                </div>

                <div class="card-body">
                    
                    
                    <div class="form-group row px-5">
						<div class="col-12 h2 p-0">
	                    	@foreach($job->jobCompany()->get() as $companie)
								{{$companie->company_name}}
							@endforeach
						</div>                       
                    </div>
                        
                    <div class="form-group row px-5">
                        <div>{{ $job->description }}</div>                            
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Start date: </b>{{ date('d.m.Y',strtotime($job->start_date)) }}</div>                  	
                    </div>

                    <div class="row form-group px-5">
                    	<div class="col-12 p-0"><b>Language: </b>
                    		@foreach($job->jobLanguage()->get() as $language)
								{{$language->language_name}}
							@endforeach
						</div>
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Salary: </b>{{ $job->salary }}</div>                  	
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Working Hours: </b>{{ $job->working_hours }}</div>                  	
                    </div>

                    <div class="form-group row px-5">
                    	<div><b>Street: </b>{{ $job->street }}</div>                  	
                    </div>

					<div class="form-group row px-5">
                    	<div><b>ZIP Code: </b>{{ $job->zipCode }}</div>                  	
                    </div>

					<div class="form-group row px-5">
                    	<div><b>City: </b>{{ $job->city }}</div>                  	
                    </div>

					<div class="form-group row px-5">
                    	<div><b>Country: </b>{{ $job->country }}</div>                  	
                    </div>

                             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection