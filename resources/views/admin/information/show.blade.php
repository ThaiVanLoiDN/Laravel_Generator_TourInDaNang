@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Information
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('admin.information.show_fields')
                    <div class="col-sm-12">
                        <a href="{!! route('admin.information.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
