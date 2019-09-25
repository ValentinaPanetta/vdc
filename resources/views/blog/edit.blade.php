@extends('layouts.default') 
@section('content')



<h2 class="text-center text-success">Editing {{$res->title}} Post</h2>
	<div class="container text-center">
		<form method="POST" action="{{ route('blog.update', $res->id) }}">
		{{ method_field('PUT') }}
		@csrf
		<div class="w-100 my-3">
			<div>Title</div>
			<input type="text" name="title" class="w-100" value="{{$res->title}}">
		</div>
		<div>
			<div class="w-100 my-3">Content</div>
			<textarea name="content" class="w-100">{{$res->content}}</textarea>
		</div>
		<div>
			<div class="w-100 my-3">Image</div>
			<input type="text" name="image" value="{{$res->image}}"  class="w-100">
		</div>
		<div>
			<div class="w-100 my-3">Video</div>
			<input type="text" name="video" value="{{$res->video}}"   class="w-100">
		</div>
		
		<div class="text-center p-3">
			<button type="submit" class="btn btn-success">Send</button>
		</div>
	</form>
	</div>
@endsection