@extends('frontend.layouts.layout')
@section('main-content')
<header class="page-header">
    <h1 class="page-title">
		VIET NAM: <span>{!! $cities->name !!}</span>
	</h1>
</header>

@include('frontend.tour.article')
@stop