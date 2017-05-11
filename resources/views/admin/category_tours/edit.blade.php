@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Type of tours
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoryTour, ['route' => ['admin.categoryTours.update', $categoryTour->id], 'method' => 'patch', 'id' => 'CategoryTour']) !!}

                        @include('admin.category_tours.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection