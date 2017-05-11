@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Things to do
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoryPost, ['route' => ['admin.categoryPosts.update', $categoryPost->id], 'method' => 'patch', 'id' => 'CategoryPost']) !!}

                        @include('admin.category_posts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection