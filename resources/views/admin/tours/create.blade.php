@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tour
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.tours.store', 'enctype' => 'multipart/form-data', 'id' => 'Tour']) !!}

                        @include('admin.tours.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
