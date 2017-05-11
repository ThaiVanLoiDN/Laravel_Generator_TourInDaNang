@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            City
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($city, ['route' => ['admin.cities.update', $city->id], 'method' => 'patch', 'id' => 'City']) !!}

                        @include('admin.cities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection