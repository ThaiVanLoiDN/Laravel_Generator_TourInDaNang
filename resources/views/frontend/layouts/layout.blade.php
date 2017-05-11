@include('frontend.layouts.header')
<div id="main">
    <div id="breadcrumbs" class="container_12 clearfix">
        <span xmlns:v="http://rdf.data-vocabulary.org/#">
			<span typeof="v:Breadcrumb">
				<a href="" rel="v:url" property="v:title">Home</a> » 
				<span class="breadcrumb_last">About us</span>
		       </span>
        </span>
    </div>
    <div class="container_12 clearfix">
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