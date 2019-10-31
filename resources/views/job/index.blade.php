@extends('layouts.default')
@section('content')

<div class="container-fluid">
    <div class="row m-3 p-5 bg-dark-t">
        <div class="col-12 h2 text-center text-lightcyan">Job Offers</div>
        @if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'trainer' OR Auth::user()->role == 'course_provider' OR Auth::user()->role == 'employer')
            <div class="col-12 my-3 text-center">
                <a href="{{ route('job.create') }}" ><button type="submit" class="btn-custom btn-custom-cyan text-light">Create Job Offer
                </button></a>
            </div>
        @endif     

        @foreach($jobs as $jobs)
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="col-12 border my-3 p-2 pb-4 bg-white corners">
                    <div class="col-12 h2 mt-3">
                        @foreach($jobs->jobProfile()->get() as $profile)
                            {{ $profile->name }}
                        @endforeach
                    </div>
                    <hr>
                    <div class="col-6">
                        <strong>posted: </strong>{{ \Carbon\Carbon::parse($jobs->created_at)->format('d/m/Y')}}
                    </div>
                    <div class="col-6">
                        {{ $jobs->city}}
                    </div>
                    
                    <div class="col-12 mb-3">
                        {{ str_limit($jobs->description, $limit = 50, $end = '...') }} 
                    </div>

                    <div class="col-12">
                        <a href="{{ route('job.show', $jobs->id) }}"><button class="btn-custom btn-custom-cyan">Details</button></a>
                        @if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'trainer' OR Auth::user()->role == 'course_provider' OR Auth::user()->role == 'employer')
                            <a href="{{ route('job.edit', $jobs->id) }}"><button class="btn-custom btn-custom-blue mx-2">Edit</button></a>
                            <form class="d-inline" action="{{ route('job.destroy', $jobs->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                
                                <button class="btn-custom btn-custom-grey" type="submit" onclick="return confirm('Are you sure, you want to delete this Offer?')">Delete</button></a>
                            </form>
                        @endif                                                
                    </div>                   
                </div>                
            </div>
        @endforeach        
    </div>
</div>




@endsection