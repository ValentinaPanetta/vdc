@extends('layouts.default') 
@section('content')
	<div class="container">
		<a href="{{ url('blog') }}" >
		<button class="btn btn-success">Back</button>
		</a>
	</div>
	<h2 class="text-center text-success">Create a New Post</h2>
	<div class="container text-center">
		<form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="w-100 my-3">
			<div>Title</div>
			<input type="text" name="title" class="w-100">
		</div>
		<div>
			<div class="w-100 my-3">Content</div>
			<textarea name="content" class="w-100"></textarea>
		</div>
		<div>
			<div class="w-100 my-3">Image</div>
			<input type="file" name="image"  class="w-100">
		</div>
		<div>
			<div class="w-100 my-3">Video</div>
			<input type="text" name="video" value="Video url"   class="w-100">
		</div>
		<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
		<div class="text-center p-3">
			<button type="submit" class="btn btn-success">Send</button>
		</div>
	</form>
	</div>
@endsection