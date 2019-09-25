@extends('layouts.default')
@section('content')

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12 h2 text-center">Job Offers</div>
        <div class="col-12 my-3 text-center">
            <a href="{{ route('job.create') }}" ><button type="submit" class="btn btn-primary text-light">Create Job Offer
            </button></a>
        </div>        

        @foreach($jobs as $jobs)
            <div class="col-md-4 col-sm-12 p-2">
                <div class="col-12 border border-info p-2">
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
                        <a href="{{ route('job.show', $jobs->id) }}"><button class="btn btn-outline-primary">Details</button></a>
                        <a href="{{ route('job.edit', $jobs->id) }}"><button class="btn btn-primary mx-2">Edit</button></a>
                        <form class="d-inline" action="{{ route('job.destroy', $jobs->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            
                            <button class="btn btn-secondary" type="submit" onclick="return confirm('Are you sure, you want to delete this Offer?')">Delete</button></a>
                        </form>
                                                
                    </div>                   
                </div>                
            </div>
        @endforeach        
    </div>
</div>




@endsection