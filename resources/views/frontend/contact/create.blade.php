@extends('frontend.layouts.contact')
@section('main-content')
<article id="post-39" class="post-39 page type-page">

    <header class="entry-header">
        <h1 class="page-title">Contact us</h1>
    </header>

    <div class="entry-content post_content">

        <p><em>Please feel free to submit your requests, questions, travel ideas, feedback.. We are always willing to answer &amp; advise all your requests. Fill in the form below and we will reply you as soon as possible.</em>
        </p>
        <p><strong>If you would NOT receive our reply within 24 hours (working day), then there’s certain system error which made the message did not reach us, so kindly send us email at <span style="color: #333399;">igo@tourinDanang.com</span>, we are happy to help.</strong>
        </p>
        <h2>Send your enquiry using below form</h2>

        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div id="contact_form">
            {!! Form::open(['route' => 'frontend.contact.store', 'id' => 'contactForm']) !!}
                <!-- Fullname Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fullname', 'Fullname:') !!}
                    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Mail Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('mail', 'Email:') !!}
                    {!! Form::email('mail', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Phone Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('phone', 'Phone Number:') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Subject -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('subject', 'Subject:') !!}
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Content Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('content', 'Content:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>

                <div>
                    <label for="c_verify">Human verification: <span>*</span>
                    </label>
                    <input type="text" style="width: 60px;" name="c_verify">+ 3 = five (Pls enter a number)
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Send enquiry', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>

    </div>
    <!-- .entry-content -->

</article>
@stop