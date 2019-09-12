@extends('layouts.default') 
@section('content')
	@foreach ($res as $res)
		<h2>User {{ $res->userId }}</h2>
		<h2>Client {{ $res->clientId }}</h2>
	@endforeach
	

@endsection