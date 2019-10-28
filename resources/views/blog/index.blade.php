@extends('layouts.default') 
@section('content')
	
	<div class="">
		
		<div class="text-center p-4">
			<h1 >VDC Blog</h1>
			<a href="{{ url('blog/create') }}" >
			<button class="btn btn-primary ">Create A New Post</button>
			</a>
		</div>
		<div class="row">
		@foreach ($res as $res)

		<div class="col-lg-4">
			
		
			<div class="shadow p-3 my-1 ">
				
				<div>
					<a href="{{ url('blog/'.$res->id) }}" title="">
					<h2 class="text-center mb-2">{{ $res->title }}</h2></a>
				</div>
				@if ($res->image != null)
					<div class="postimg mb-2">
					<img src="{{ $res->image}}">
					</div>
				@endif
				
				<div>
					<p>{{ $res->content }}</p>
				</div>
				<div>
					<p class="text-right">{{ $res->created_at }}</p>
				</div>
				<div class="text-right">
					<p class=" ">{{$res->comments()->get()->count()}} Comments</p>
				</div>
				@foreach($res->post_auth()->get() as $auth_p)
					@switch($auth_p->role)
					    @case('off_admin')
					        {{ $auth_p->name }} (Admin)
					        @break
					    @case('sys_admin')
					        {{ $auth_p->name }} (Sys_Admin)
					        @break
						@case('client')
					        <a href="{{ url('../client/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
					        @break
					    @case('trainer')
					        <a href="{{ url('../employee/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
					        @break
					    @case('course_provider')
					        <a href="{{ url('../employee/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
					        @break
					    @case('employer')
					        {{ $auth_p->name }} (Employer)
					        @break
					    @case('consultant')
					        <a href="{{ url('../consultant/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
					        @break
					    @default
					            {{ $auth_p->name }}({{ $auth_p->role }})
					@endswitch
					<div>
					</div>
				@endforeach
			</div>
			</div>
		
		@endforeach
	</div>
	</div>


@endsection