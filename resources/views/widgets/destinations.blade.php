<li id="tag_cloud-2" class="widget-container widget_tag_cloud">
        <h4 class="widget-title">Destinations</h4>
        <div class="tagcloud">

        	@php
	    		$i = 20;
	    	@endphp
	        @foreach ($arCity as $key => $city)
	        	@if ($i > 9)
	        @php
	        		$i -= 2;
	        @endphp
	        	@endif
	        <a href="{{ route('frontend.tour.city', ['slug' => str_slug($city->name), 'id' => $city->id]) }}" class="" title="{{$city->name}}" style="font-size: {{ $i  }}pt;">{{$city->name}}</a>
	        @endforeach
        </div>
    </li>