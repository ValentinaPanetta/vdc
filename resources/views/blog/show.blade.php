@extends('layouts.default') 
@section('content')
@foreach($res->post_auth()->get() as $author)
	@php($auth_id = $author->id)
@endforeach
	<div class="container shadow p-2 bg-darkcyan-t text-white rounded">
		@auth
			{{-- expr --}}
		
			@if (Auth::id() == $auth_id or Auth::User()->role == 'sys_admin' or Auth::User()->role == 'off_admin')
				<div class="d-flex justify-content-end">
						<a href="{{ url('/blog/'.$res->id.'/edit') }}"><button class="btn btn-info text-white">Edit</button></a>
						<form method="POST" action="{{ route('blog.destroy', $res->id) }}">
	                        {{ method_field('DELETE') }}
	                        @csrf
	                        <button type="submit" class="btn btn-danger"   onclick="return confirm('Are you sure to delete?')">Delete</button>        
						</form>					
				</div>
			@endif
		@endauth
		<div class="border-bottom pmy-5 bg-lgblue-t">
			<h2 class="text-center text-darkblue p-3 rounded text-purple">{{ $res->title }}</h2>
		</div>
		@if ($res->image != null)
		<div class="postimg">
			<img src="{{ $res->image}}">
		</div>
		@endif
		<div class="py-4">
			<p class="text-center big_text">{{ $res->content }}</p>
		</div>
		
		<div>
			<p class="big_text"><span>Author:</span>
			 @foreach($res->post_auth()->get() as $auth_p)
				@switch($auth_p->role)
				    @case('off_admin')
				        {{ $auth_p->name }} (Admin)
				        @break
				    @case('sys_admin')
				        {{ $auth_p->name }} (Sys_Admin)
				        @break
					@case('client')
				        <a class="text-info" href="{{ url('../client/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
				        @break
				    @case('trainer')
				        <a class="text-info" href="{{ url('../employee/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
				        @break
				    @case('course_provider')
				        <a class="text-info" href="{{ url('../employee/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
				        @break
				    @case('employer')
				        {{ $auth_p->name }} (Employer)
				        @break
				    @case('consultant')
				        <a class="text-info" href="{{ url('../consultant/'.$auth_p->id ) }}">{{ $auth_p->name }} ({{ $auth_p->role }})</a>
				        @break
				    @default
				            {{ $auth_p->name }}({{ $auth_p->role }})
				@endswitch
			@endforeach</p>
		</div>
		<div>
			<p class="">{{ $res->created_at }}</p>
		</div>
		
			<div class="text-right">
				@auth
						<button class="btn btn-success" id="AddComt">Comment</button>
				@else
						<a href="{{ url('/login') }}"><strong>Log in to write a comment</strong></a>
				@endauth
			</div>
		
		
		
	</div>

	<div class="container">
		@auth
			<div class="shadow p-3 rounded bg-mint-t" id="commentForm"> 
				<div class="text-right " id="close_msg">
					<h3 class="text-danger" style="cursor: pointer;">X</h3>
				</div>
				<form method="POST" action="{{ route('postComments.store') }}">
					@csrf
					<h3 class="text-white ">Write your comment</h3>
					<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
					<input type="hidden" name="FK_post" value="{{ $res->id }}" >
					<textarea name="content" class="w-100"></textarea >
					<div class="text-right">
						<button type="submit" class="btn btn-primary text-right">Send</button>
					</div>
				</form>
			</div>
		@endauth
	@foreach($res->comments()->get() as $text) {{--Comments--}}
				<div class="shadow p-3 ml-4 mt-1 mb-4 rounded bg-mint-t">	
					<form method="POST" action="{{ route('postComments.destroy', $text->id) }}">
                        {{ method_field('DELETE') }}
                        @csrf
                        <div class="text-right">
                        	<button type="submit" class="btn btn-danger"   onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </div>
					</form>
					<div class="">
						<h2 class="text-purple">
							{{ str_limit($text->content, $limit = 20, $end = '...') }}...
						</h2>
					</div>
					<p class="big_text text-white">{{$text->content}}</p>
					<p class="text-right">{{$text->created_at}}</p>
					@foreach ($text->comm_auth()->get() as $auth_m)
					@switch($auth_m->role)
					    @case('off_admin')
					        {{ $auth_m->name }} (Admin)
					        @break
					    @case('sys_admin')
					        {{ $auth_m->name }} (Sys_Admin)
					        @break
						@case('client')
					        <a class="text-white" href="{{ url('../client/'.$auth_m->id ) }}">{{ $auth_m->name }} ({{ $auth_m->role }})</a>
					        @break
					    @case('trainer')
					        <a class="text-white" href="{{ url('../employee/'.$auth_m->id ) }}">{{ $auth_m->name }} ({{ $auth_m->role }})</a>
					        @break
					    @case('course_provider')
					        <a class="text-white" href="{{ url('../employee/'.$auth_m->id ) }}">{{ $auth_m->name }} ({{ $auth_m->role }})</a>
					        @break
					    @case('employer')
					        {{ $auth_m->name }} (Employer)
					        @break
					    @case('consultant')
					        <a class="text-white" href="{{ url('../consultant/'.$auth_m->id ) }}">{{ $auth_m->name }} ({{ $auth_m->role }})</a>
					        @break
					    @default
					            {{ $auth_m->name }}({{ $auth_m->role }})
					@endswitch

				@endforeach
				</div>	
				
			@endforeach
			</div>
@endsection