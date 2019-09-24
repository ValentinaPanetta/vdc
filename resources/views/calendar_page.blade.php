@extends('layouts.default')
@section('content')
@foreach ($res as $res) {{-- All Subscribed Consultings--}}	
 	{{--<div class="border border-danger">
 		
  	<h3>title: {{$res->title}}</h3>
 	<h3>FK_consulting: {{$res->FK_consulting}}</h3>
 	<h3>consult_date: {{$res->consult_date}}</h3>
 	<h3>duration: {{$res->duration}}</h3>
$res->consultings.id
	</div>--}}
	@php($d = substr($res->consult_date,0,10))
	@php($f = date("d-n-Y", strtotime($d)))
	@php($con_date[] = $f)
	@php($con_title[] = $res->title)
	@php($con_id[] = $res->con_ID)
@endforeach 

@foreach ($unsub as $un)  {{-- All Consultings--}}
	@php($ud = substr($un->consult_date,0,10))
	@php($uf = date("d-n-Y", strtotime($ud)))
	@php($un_date[] = $uf)
	@php($un_title[] = $un->title)
	@php($un_id[] = $un->id)
@endforeach

@include('includes.calendar')


@endsection
