@foreach ($posts as $post)
	@php
		$routeDetail = route('frontend.post.detail', ['slug' => str_slug($post->name), 'id' => $post->id]);
	@endphp
	@if ($post->image == '')
    	@php
    		$post->image = 'noimage.jpg';
    	@endphp
    @endif
	<article id="post-827" class="post-827 guide type-guide has-post-thumbnail things-to-do-attractions things-to-do-eat-and-drink">
	    <figure class="thumbt">
	        <a href="{{ $routeDetail }}" title="{{ $post->name }}"><img width="150" height="150" src="{{ $imageUrl }}/{!! $post->image !!}" class="img-polaroid featured-image wp-post-image" alt="vinahouse space hoi an" title="{{ $post->name }}" srcset="{{ $imageUrl }}/{!! $post->image !!} 150w, {{ $imageUrl }}/{!! $post->image !!} 120w" sizes="(max-width: 150px) 100vw, 150px">
	        </a>
	    </figure>
	    <header class="entry-header">
	        <h2 class="entry-title"><a href="{{ $routeDetail }}" title="{{ $post->name }}" rel="bookmark">{{ $post->name }}</a></h2> </header>

	    <div class="entry-content clearfix">
	        <p>{{ str_limit($post->preview, 250) }}</p>
	    </div>
	</article>
@endforeach

<div class="text-center">
	
{{ $posts->links() }}
</div>