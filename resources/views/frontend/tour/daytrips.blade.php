@extends('frontend.layouts.layout')
@section('main-content')
<header class="page-header">
    <h1 class="page-title">
		Da Nang guide: <span>{!! $daytrips !!} days</span>
	</h1>
</header>

@include('frontend.tour.article')
@stop