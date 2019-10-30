@extends('layouts.welcome_master')
	@section('account')	
		
		 <div id="Account" >
                
                 <div id="yellow" class=" row ">
	                <div class="col-lg-4 p-3 ">
	                	<a href="{{ url('consultings') }}">
		                    <div class="text_img" >
		                    	<img class="img-fluid" src="/backgrounds/consulting.jpg">
		                    	<span class="hidden_text p-3">
									<h3 class="text-center text-white">Consulting</h3>
					                  <p class="text-white">
					                
					                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					                  
					                  </p> 
			              		</span>
		                        <h2 class="text-white">Intro consulting</h2>
		                    </div>
	                	</a>
	                </div>
	                <div class="col-lg-4 p-3">
	                	<a href="{{ url('courses') }}">
		                    <div class="text_img" >
		                    	<img class="img-fluid" src="/backgrounds/course.jpg">
		                    	<span class="hidden_text p-3">
		                    	<h3 class="text-center text-white littleTitle">Courses</h3>
					                  <p class="text-white">
					                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					                  
					                  </p> 
					             </span>
		                        <h2 class="text-white">Intro courses</h2>
		                    </div>
	              	    </a>
	                </div>

	                <div class="col-lg-4 p-3">
	                	<a href="{{ url('job') }}">
		                    <div class="text_img" >
		                    	<img class="img-fluid" src="/backgrounds/career.jpg">
		                    	<span class="hidden_text p-3">
		                    	<h3 class="text-center text-white littleTitle">Career</h3>
					                  <p class="text-white">
					                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					                  
					                  </p> 
					                  </span>
		                        <h2 class="text-white">Intro career</h2>
		                    </div>
		                </a>    
	                </div>

            	</div>

            	<div class="w-100 border border-info my-3 messageboard">
            		<div>
            			<h3 class="text-center p-3 text-white font-weight-bold">Message Board</h3>
            		</div>
            		<div class="row">
            			<div class="col-lg-9">
            				<div class="">
            					<ul class="msg">
            						<li><a href="#"><div>Subject - From Mr Burns - 12-09-2019 22:29</div></a></li>
            						<li><a href="#"><div>Subject2 - From Mr Clat - 12-09-2019 22:29</div></a></li>
            						<li><a href="#"><div>Subject3 - From Mr Frank - 12-09-2019 22:29</div></a></li>
            						<li><a href="#"><div>Subject4 - From Mr ROwel - 12-09-2019 22:29</div></a></li>
            					</ul>
            				</div>
            			</div>
            			<div class="col-lg-3">
            				<div class="">
            					<a href="#" title="">
	            					<div class="btn-our m-2">
	            						You Have 3 New Msg
	            					</div>
            					</a>
            					<a href="#" title="">
	            					<div class="btn-our m-2">
	            						Write A Msg
	            					</div>
            					</a>
            				</div>
            			</div>
            			<div class="col-lg-6">
            				
            			</div>
            		</div>
            	</div>
            </div>
	@endsection