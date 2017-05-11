@foreach($tours as $tour)
<article id="post-792" class="post-792 tour type-tour has-post-thumbnail duration-day-tour travel-style-active-tours travel-style-sightseeing destination-da-nang">
    <figure class="thumbt">
        @php
            $routeDetail = route('frontend.tour.detail', ['slug' => str_slug($tour->name), 'id' => $tour->id]);
        @endphp
        <a href="{{ $routeDetail }}" title="{!! $tour->name !!}">
	        @if ($tour->image == '')
	        	@php
	        		$tour->image = 'noimage.jpg';
	        	@endphp
	        @endif
            <img width="150" height="150" src="{{ $imageUrl }}/{!! $tour->image !!}" class="img-polaroid featured-image wp-post-image" alt="{!! $tour->name !!}" title="{!! $tour->name !!}">
        </a>
    </figure>
    <header class="entry-header">
        <h2 class="entry-title">
			<a href="{{ $routeDetail }}" title="{!! $tour->name !!}" rel="bookmark">{!! $tour->name !!}</a>
		</h2>
    </header>
    <div class="entry-content clearfix">
        <span class="price">from 
			<span>${!! $tour->price !!}</span>
        </span>
        <i class="fa fa-clock-o"></i>
        <a href="{{ route('frontend.tour.daytrips', $tour->daytour) }}">
			@php
				echo ($tour->daytour == 1)?'Day tour':"$tour->daytour days";
			@endphp
        </a> &nbsp;&nbsp;
        <i class="fa fa-map-marker"></i>
        <a href="#">Da Nang</a>,
        <p>{!! str_limit($tour->preview, 250) !!}</p>
    </div>
</article>
@endforeach
<div class="text-center">
    
{{ $tours->links() }}
</div>