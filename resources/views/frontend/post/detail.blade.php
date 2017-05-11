@extends('frontend.layouts.layout')
@section('main-content')
<article id="post-827" class="post-827 guide type-guide has-post-thumbnail things-to-do-attractions things-to-do-eat-and-drink">
    <header class="entry-header">
        <h1 class="entry-title">{{ $post->name}}</h1> </header>
    <div class="entry-content clearfix">
        {!! $post->content !!}
    </div>
    <div class="yarpp-related">
        <h3>See also:</h3>
        <div class="yarpp-thumbnails-horizontal">
            @foreach ($otherPosts as $otherPost)
            <a class="yarpp-thumbnail" href="{{ route('frontend.post.detail', ['slug' => str_slug($otherPost->name), 'id' => $otherPost->id]) }}" title="{{ $otherPost->name }}">

                @if ($otherPost->image == '')
                    @php
                        $otherPost->image = 'noimage.jpg';
                    @endphp
                @endif

                <img width="120" height="80" src="{{ $imageUrl }}/{!! $otherPost->image !!}" class="attachment-yarpp-thumbnail size-yarpp-thumbnail wp-post-image" alt="my son sanctuary" srcset="{{ $imageUrl }}/{!! $otherPost->image !!} 600w, {{ $imageUrl }}/{!! $otherPost->image !!} 500w" sizes="(max-width: 120px) 100vw, 120px">

                <span class="yarpp-thumbnail-title">{{ $otherPost->name }}</span>
            </a>
            
            @endforeach
        </div>
    </div>
</article>
@stop