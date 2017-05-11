<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tour->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $tour->name !!}</p>
</div>

<!-- Id Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $tour->category->name !!}</p>
</div>

<!-- Daytour Field -->
<div class="form-group col-sm-6">
    {!! Form::label('daytour', 'Daytour:') !!}
    <p>{!! $tour->daytour !!}</p>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    <p>${!! $tour->price !!}</p>
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user', 'Author:') !!}
    <p>{!! $tour->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tour->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tour->updated_at !!}</p>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    @if($tour->image != "")
    <p><img src="{!! $imageUrl !!}/{!! $tour->image !!}" width="400px" class="img-responsive"></p>
    @else
    <p><img src="{!! $imageUrl !!}/noimage.jpg" width="400px" class="img-responsive"></p>
    @endif
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'Cities:') !!}
    <p>
        @foreach ($tour->city as $city)
            [{!! $city['name'] !!}]
        @endforeach
    </p>
</div>

<!-- Preview Field -->
<div class="form-group col-sm-12">
    {!! Form::label('preview', 'Preview:') !!}
    <div class="show-detail">{!! $tour->preview !!}</div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <div class="show-detail">{!! $tour->content !!}</div>
</div>
