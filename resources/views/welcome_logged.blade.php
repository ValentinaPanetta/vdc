@extends('layouts.welcome_master')
	@section('account')	
		
		 <div id="Account" >
                
                 <div id="yellow" class=" row px-3">
	                <div class="col-lg-4 p-3">
	                	<a href="{{ url('consultings') }}">
		                    <div class="border border-success" style="height: 12em;">
		                        <h2 class="text-success">Intro consulting</h2>
		                    </div>
	                	</a>
	                </div>
	                <div class="col-lg-4 p-3">
	                	<a href="{{ url('courses') }}">
		                    <div class="border border-success" style="height: 12em;">
		                        <h2 class="text-success">Intro courses</h2>
		                    </div>
	              	    </a>
	                </div>

	                <div class="col-lg-4 p-3">
	                	<a href="{{ url('job') }}">
		                    <div class="border border-success" style="height: 12em;">
		                        <h2 class="text-success">Intro career</h2>
		                    </div>
		                </a>    
	                </div>

            	</div>
            	<div class="w-100 border border-info my-3" style="height: 12em;">
            		message board
            	</div>
            </div>
	@endsection