<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

<div class="form-group">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Category Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('id_category', $arDMT, null, ['class' => 'form-control select2', 'style' => 'width: 100%']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Daytour Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('daytour', 'Daytour:') !!}
        {!! Form::number('daytour', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Price Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cities -->
    <div class="col-sm-6">
        <div class="form-group">
        {!! Form::label('cities', 'Cities:') !!}
        {!! Form::select('cities', $arCt, null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Select more cities', 'style' => 'width: 100%', 'name' => 'cities[]']) !!}
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Image Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', ['onchange' => 'viewImg(this)']) !!}
        <br>
        @php
            if (isset($tour->image) && ($tour->image != '')){
                $image = $tour->image;
            }    
            else{
                $image = 'noimage.jpg';
            }
        @endphp
        <p><img id="avartar-img-show" src="{{ $imageUrl }}/{!! $image !!}" alt="avatar" class="img-responsive" ></p>
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Preview Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('preview', 'Preview:') !!}
        {!! Form::textarea('preview', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Content Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('content', 'Content:') !!}
        <br>
        {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('admin.tours.index') !!}" class="btn btn-default">Cancel</a>
    </div>
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    $(function () {
        $(".select2").select2();
    });   
</script>

<script>
  function viewImg(img) {
    var fileReader = new FileReader;
    fileReader.onload = function(img) {
      var avartarShow = document.getElementById("avartar-img-show");

      avartarShow.src = img.target.result
    }, fileReader.readAsDataURL(img.files[0])
  }
</script>
