@extends('layouts.default')
@section('content')
@php
$con_date = null;
$un_date = null;
@endphp


@foreach ($res as $res) {{-- All Subscribed Consultings--}}	
	@php($d = substr($res->consult_date,0,10))
	@php($f = date("d-n-Y", strtotime($d)))
	@php($con_date[] = $f)
	@php($con_title[] = $res->title)
	@php($con_id[] = $res->con_ID)
@endforeach 

@include('includes.calendar')


@endsection





{{--All Consultings
@foreach ($unsub as $un)   
	@php($ud = substr($un->consult_date,0,10))
	@php($uf = date("d-n-Y", strtotime($ud)))
	@php($un_date[] = $uf)
	@php($un_title[] = $un->title)
	@php($un_id[] = $un->id)
@endforeach--}}
