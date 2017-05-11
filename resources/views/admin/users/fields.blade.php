<div class="form-group">
    <!-- Name Field -->
    <div class="col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Category Field -->
    <div class="col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <!-- Name Field -->
    <div class="col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password', null, ['class' => 'form-control', 'value' => '']) !!}
    </div>

    <!-- Category Field -->
    <div class="col-sm-6">
        {!! Form::label('repassword', 'Repassword:') !!}
        {!! Form::text('repassword', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.user.index') !!}" class="btn btn-default">Cancel</a>
</div>
