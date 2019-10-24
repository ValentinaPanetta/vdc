@extends('layouts.default')
@section('content')
@php
$con_date = null;
$un_date = null;
$course_start = null;
$course_name = null;
$course_id = null;
@endphp


@foreach ($res as $res) {{-- All Subscribed Consultings--}}	
	@php($d = substr($res->consult_date,0,10))
	@php($f = date("d-n-Y", strtotime($d)))
	@php($con_date[] = $f)
	@php($con_title[] = $res->title)
	@php($con_id[] = $res->con_ID)
@endforeach 

@foreach ($courses as $courses)

	@foreach ($courses->paidCourse()->get() as $c)
		
	
							<!-- Start date -->
			
			@php($cs = substr($c->start_date,0,10))
			@php($cs_2 = date("j-n-Y", strtotime($cs)))
			@php($course_start[] = $cs_2)
			<!-- End Date -->
			@php($es = substr($c->end_date,0,10))
			@php($es_2 = date("j-n-Y", strtotime($es)))
			@php($course_end[] = $es_2)
			<!-- Course Name -->
			@php($course_name[] = $c->name)
			<!-- Course Id -->
			@php($course_id[] = $c->id)
		
		
	@endforeach
@endforeach


		
@include('includes.calendar')


@endsection


