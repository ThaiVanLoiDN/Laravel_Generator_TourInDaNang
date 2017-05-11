<li id="tag_cloud-4" class="widget-container widget_tag_cloud">
    <h4 class="widget-title">Plan for days?</h4>
    <div class="tagcloud">
        <a href="{{ route('frontend.tour.daytour') }}" class="" title="Day tour" style="font-size: 22pt;">Day tour</a>
    	@php
    		$i = 20;
    	@endphp
        @foreach ($arDays as $arDay)
        @if ($arDay->daytour > 1)
            @if ($i > 9)
        @php
                $i -= 2;
        @endphp
            @endif
        <a href="{{ route('frontend.tour.daytrips', $arDay->daytour) }}" class="" title="{{$arDay->daytour}} days" style="font-size: {{ $i  }}pt;">{{$arDay->daytour}} days</a>
        @endif
        @endforeach
    </div>
</li>