@include('frontend.layouts.header')

<div id="main">
    <div class="featured-wrapper clearfix">
        <div class="container_12 clearfix">
            <div id="content" class="grid_12" role="main">
                <article id="post-0" class="landing">
                    @foreach ($newTour as $tourNew)
                    @php
                        $routeDetail = route('frontend.tour.detail', ['slug' => str_slug($tourNew->name), 'id' => $tourNew->id]);
                    @endphp
                    @if ($tourNew->image == '')
                        @php
                            $tourNew->image = 'noimage.jpg';
                        @endphp
                    @endif
                    <div id="landing-text" class="one_half alpha">
                        <h1>{!! $tourNew->name !!}</h1>
                        <p>{!! str_limit($tourNew->preview, 100) !!}</p>
                        <p class="action-full"><a class="btn btn-primary btn-large" href="{!! $routeDetail !!}">See details</a>
                        </p>
                    </div>
                    <div id="landing-media" class="one_half omega">
                        <p><img src="{{ $imageUrl }}/{!! $tourNew->image !!}" alt="My Son tour from Da nang">
                        </p>
                    </div>
                    @endforeach
                </article>
            </div>
        </div>
        <!-- #container -->
    </div>
    <!-- featured wrapper -->
    <div class="container_12 clearfix">
        <div id="home-widget-area" class="clearfix">
        </div>
        <div id="content" class="grid_8 " role="main">
            @yield('main-content')
        </div>
        <div id="sidebar_one" class="grid_4 widget-area blog-widgets" role="complementary">
            <ul class="xoxo">
                @widget('danang_tour')
            </ul>
        </div>
        <div id="sidebar_two" class="grid_4 widget-area blog-widgets pull-right" role="complementary">
            @include('frontend.layouts.plan')
        </div>
    </div>
    <!-- #container -->
</div>
<!-- #main -->
@include('frontend.layouts.footer')