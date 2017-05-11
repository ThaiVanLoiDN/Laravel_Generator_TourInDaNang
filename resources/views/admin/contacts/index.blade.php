@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Contacts</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive">
                    @include('admin.contacts.table')
            </div>
            <div class="box-footer clearfix">
            <div class="pagination-sm no-margin pull-right">
                {{ $contacts->links() }}
            </div>
        </div>
        </div>
        
    </div>
@endsection

