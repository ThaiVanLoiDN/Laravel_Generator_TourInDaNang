@extends('frontend.layouts.contact')
@section('main-content')
<article id="post-36" class="post-36 page type-page">
    <header class="entry-header clearfix">
        <h1 class="page-title">{!! $info->name !!}</h1>
    </header>

    <div class="entry-content clearfix">
        {!! $info->content !!}
    </div>
    <footer class="entry-meta clearfix">

    </footer>
</article>
@stop