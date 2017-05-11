@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Posts</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.posts.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive">
                    @include('admin.posts.table')
            </div>
            <div class="box-footer clearfix">
            <div class="pagination-sm no-margin pull-right">
                {{ $posts->links() }}
            </div>
        </div>
        </div>
        
    </div>
@endsection

