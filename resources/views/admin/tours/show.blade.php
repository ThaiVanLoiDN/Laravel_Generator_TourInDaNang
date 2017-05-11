@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tour
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('admin.tours.show_fields')
                    <div class="col-sm-12">
                        <a href="{!! route('admin.tours.index') !!}" class="btn btn-default">Back</a>
                    </div>    
                </div>
            </div>
        </div>
    </div>
@endsection