@extends('backend.dark-app')

@section('title')
    Mail Configuration
@stop

@push('css')
    <!---Internal Fileupload css-->
    <link href="{{ asset('backend/app-assets/vendors/js/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
@endpush


@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Mail Configuration')
    @endcomponent

    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            @include('backend.layouts.partials.session')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Mail Settings') }}</h3>
                </div>
                <div class="card-body h-100">
                    <form class="needs-validation" autocomplete="off" action="{{ route('update-settings') }}" method="post"
                        autocomplete="off" enctype="multipart/form-data" id="form">
                        @csrf


                        <div class="accordion accordion-margin" id="accordionMargin" data-toggle-hover="true">


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin1" aria-expanded="false"
                                        aria-controls="accordionMargin1">
                                        Email Content
                                    </button>
                                </h2>
                                <div id="accordionMargin1" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin1" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Email Subject</label>
                                                    <input type="text" name="email_subject" class="form-control"
                                                        placeholder="Enter Email Subject" data-parsley-required
                                                        data-parsley-required-message="{{ __('email subject is required') }}"
                                                        value="{{ array_key_exists('email_subject', $settings) ? $settings['email_subject'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Email Template</label>
                                                    <textarea type="text" name="email_template" class="form-control ckeditor" id="mailEditor1" rows="3">{{ array_key_exists('email_template', $settings) ? $settings['email_template'] : '' }}</textarea>

                                                    <small class="form-text text-warning">Be carefull use these variables in
                                                        your template
                                                        {user_name} /
                                                        {vaccine} /
                                                        {day_date} /
                                                        {day_time}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin2" aria-expanded="false"
                                        aria-controls="accordionMargin2">
                                        Waiting List Email Notification
                                    </button>
                                </h2>
                                <div id="accordionMargin2" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin2" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Email Subject</label>
                                                    <input type="text" name="wl_email_subject" class="form-control"
                                                        placeholder="Enter Email Subject" data-parsley-required
                                                        data-parsley-required-message="{{ __('email subject is required') }}"
                                                        value="{{ array_key_exists('wl_email_subject', $settings) ? $settings['wl_email_subject'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Email Template</label>
                                                    <textarea type="text" name="wl_email_template" class="form-control ckeditor" id="mailEditor2" rows="3">{{ array_key_exists('wl_email_template', $settings) ? $settings['wl_email_template'] : '' }}</textarea>

                                                    <small class="form-text text-warning">Be carefull use these variables in
                                                        your template
                                                        {user_name} /
                                                        {vaccine}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin3" aria-expanded="false"
                                        aria-controls="accordionMargin3">
                                        Mail Settings
                                    </button>
                                    </h3>
                                    <div id="accordionMargin3" class="accordion-collapse collapse"
                                        aria-labelledby="headingMargin3" data-bs-parent="#accordionMargin" style="">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Mailer</label>
                                                    <input type="text" name="MAIL_MAILER" class="form-control"
                                                        placeholder="Enter mail mailer"
                                                        value="{{ array_key_exists('MAIL_MAILER', $settings) ? $settings['MAIL_MAILER'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Host</label>
                                                    <input type="text" name="MAIL_HOST" class="form-control"
                                                        placeholder="Enter mail host"
                                                        value="{{ array_key_exists('MAIL_HOST', $settings) ? $settings['MAIL_HOST'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Posrt</label>
                                                    <input type="text" name="MAIL_PORT" class="form-control"
                                                        placeholder="Enter mail port"
                                                        value="{{ array_key_exists('MAIL_PORT', $settings) ? $settings['MAIL_PORT'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Username</label>
                                                    <input type="text" name="MAIL_USERNAME" class="form-control"
                                                        placeholder="Enter mail username"
                                                        value="{{ array_key_exists('MAIL_USERNAME', $settings) ? $settings['MAIL_USERNAME'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Password</label>
                                                    <input type="text" name="MAIL_PASSWORD" class="form-control"
                                                        placeholder="Enter mail password"
                                                        value="{{ array_key_exists('MAIL_PASSWORD', $settings) ? $settings['MAIL_PASSWORD'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail Encryption</label>
                                                    {{-- <input type="text" name="MAIL_ENCRYPTION" class="form-control"
                                                    placeholder="Enter mail encryption"
                                                    value="{{ array_key_exists('MAIL_ENCRYPTION', $settings) ? $settings['MAIL_ENCRYPTION'] : '' }}"> --}}

                                                    <select name="MAIL_ENCRYPTION" class="form-control">
                                                        <option value="">Select Encryption</option>
                                                        <option value="tls"
                                                            {{ array_key_exists('MAIL_ENCRYPTION', $settings) && $settings['MAIL_ENCRYPTION'] == 'tls' ? 'selected' : '' }}>
                                                            tls</option>
                                                        <option value="ssl"
                                                            {{ array_key_exists('MAIL_ENCRYPTION', $settings) && $settings['MAIL_ENCRYPTION'] == 'ssl' ? 'selected' : '' }}>
                                                            ssl</option>
                                                    </select>


                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail From Address</label>
                                                    <input type="email" name="MAIL_FROM_ADDRESS" class="form-control"
                                                        placeholder="Enter mail from address"
                                                        value="{{ array_key_exists('MAIL_FROM_ADDRESS', $settings) ? $settings['MAIL_FROM_ADDRESS'] : '' }}">
                                                </div>
                                                <div class="form-group col-12 mt-2">
                                                    <label>Mail From Name</label>
                                                    <input type="text" name="MAIL_FROM_NAME" class="form-control"
                                                        placeholder="Enter mail from name"
                                                        value="{{ array_key_exists('MAIL_FROM_NAME', $settings) ? $settings['MAIL_FROM_NAME'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin4" aria-expanded="false"
                                        aria-controls="accordionMargin4">
                                        Test Mail
                                    </button>
                                    </h3>
                                    <div id="accordionMargin4" class="accordion-collapse collapse"
                                        aria-labelledby="headingMargin4" data-bs-parent="#accordionMargin"
                                        style="">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-12 mt-2">
                                                    <a href="{{ route('test-email') }}" class="btn btn-outline-warning">
                                                        <i class="fa fa-envelope"></i>
                                                        Test Mail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                            <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">
                                {{ __('Save') }}
                            </button>
                            <a class="btn btn-danger waves-effect waves-float waves-light mx-1" style="height: 40px"
                                href="{{ route('dashboard') }}"> {{ __('Back') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection


@push('js')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/components/components-accordion.js') }}"></script>
    <!-- END: Page JS-->

    <!--Internal Fileuploads js-->
    <script src="{{ asset('backend/app-assets/vendors/js/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/fileuploads/js/file-upload.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


    <script>
        $(document).ready(function() {
            $('[name="redirect"]').change(function(e) {
                e.preventDefault();
                var value = $('[name="redirect"]').is(':checked');
                if (value) {
                    $("#url_input").show();
                } else {
                    $("#url_input").hide();
                }
            });
        });
    </script>

    {{-- <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
    <script type="text/javascript">
        CKEDITOR.replace('mailEditor1', {
            filebrowserUploadUrl: "{{ route('image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('mailEditor2', {
            filebrowserUploadUrl: "{{ route('image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
