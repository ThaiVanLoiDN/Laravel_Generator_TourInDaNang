<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $post->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $post->name !!}</p>
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $post->category->name !!}</p>
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'Author:') !!}
    <p>{!! $post->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $post->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $post->updated_at !!}</p>
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    @if($post->image != "")
    <p><img src="{!! $imageUrl !!}/{!! $post->image !!}" width="400px" class="img-responsive"></p>
    @else
    <p><img src="{!! $imageUrl !!}/noimage.jpg" width="400px" class="img-responsive"></p>
    @endif
</div>

<!-- Preview Field -->
<div class="form-group col-sm-12">
    {!! Form::label('preview', 'Preview:') !!}
    <div class="show-detail">{{ $post->preview }}</div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <div class="show-detail">{!! $post->content !!}</div>
</div>