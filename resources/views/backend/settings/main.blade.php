@extends('backend.dark-app')

@section('title')
    Main Settings
@stop

@push('css')
    <!---Internal Fileupload css-->
    <link href="{{ asset('backend/app-assets/vendors/js/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
@endpush


@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Settings')
    @endcomponent

    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            @include('backend.layouts.partials.session')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Main Settings') }}</h3>
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
                                        Home Page Title
                                    </button>
                                </h2>
                                <div id="accordionMargin1" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin1" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="page_title" class="form-control"
                                                placeholder="Enter Home Page Title"
                                                value="{{ array_key_exists('page_title', $settings) ? $settings['page_title'] : '' }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin2" aria-expanded="false"
                                        aria-controls="accordionMargin2">
                                        Image and Logo
                                    </button>
                                </h2>
                                <div id="accordionMargin2" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin2" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="dropify" name="logo" data-height="200"
                                                    @if (array_key_exists('logo', $settings)) data-default-file="{{ asset('storage/images/settings/' . $settings['logo']) }}" @else  data-parsley-required= true data-parsley-required-message='{{ __('logo is required') }}' @endif>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label">Home Page Image</label>
                                                <input type="file" class="dropify" name="page_image"
                                                    data-height="200"
                                                    @if (array_key_exists('page_image', $settings)) data-default-file="{{ asset('storage/images/settings/' . $settings['page_image']) }}" @else  data-parsley-required= true data-parsley-required-message='{{ __('home page image is required') }}' @endif>
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
                                        Social Medial
                                    </button>
                                </h2>
                                <div id="accordionMargin3" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin3" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="form-group">
                                            <label> Facebook </label>
                                            <input type="url" name="facebook_link" class="form-control"
                                                data-parsley-required
                                                data-parsley-required-message="{{ __('facebook link is required') }}"
                                                data-parsley-trigger="keyup" data-parsley-type="url"
                                                data-parsley-type-message="{{ __('this value should be a valid url') }}"
                                                placeholder="{{ __('https://facebook.com') }}"
                                                value="{{ array_key_exists('facebook_link', $settings) ? $settings['facebook_link'] : '' }}">
                                        </div>
                                        <div class="form-group my-2">
                                            <label> Twitter </label>
                                            <input type="url" name="twitter_link" class="form-control"
                                                data-parsley-required
                                                data-parsley-required-message="{{ __('twitter link is required') }}"
                                                data-parsley-trigger="keyup" data-parsley-type="url"
                                                data-parsley-type-message="{{ __('this value should be a valid url') }}"
                                                placeholder="{{ __('https://twitter.com') }}"
                                                value="{{ array_key_exists('twitter_link', $settings) ? $settings['twitter_link'] : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label> Instagram </label>
                                            <input type="url" name="instagram_link" class="form-control"
                                                data-parsley-required
                                                data-parsley-required-message="{{ __('instagram link is required') }}"
                                                data-parsley-trigger="keyup" data-parsley-type="url"
                                                data-parsley-type-message="{{ __('this value should be a valid url') }}"
                                                placeholder="{{ __('https://instagram.com') }}"
                                                value="{{ array_key_exists('instagram_link', $settings) ? $settings['instagram_link'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin4" aria-expanded="false"
                                        aria-controls="accordionMargin4">
                                        SEO Settings
                                    </button>
                                </h2>
                                <div id="accordionMargin4" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin4" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Facebook pixel</label>
                                                    <textarea type="text" name="facebook_pixel" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('facebook pixel is required') }}"
                                                        placeholder="Enter Facebook pixel">{{ array_key_exists('facebook_pixel', $settings) ? $settings['facebook_pixel'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Google ID head</label>
                                                    <textarea type="text" name="google_id_head" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('google id head is required') }}"
                                                        placeholder="Enter Google ID head">{{ array_key_exists('google_id_head', $settings) ? $settings['google_id_head'] : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Google ID footer</label>
                                                    <textarea type="text" name="google_id_footer" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('google id footer is required') }}"
                                                        placeholder="Enter Google ID footer">{{ array_key_exists('google_id_footer', $settings) ? $settings['google_id_footer'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Track Code</label>
                                                    <textarea type="text" name="track_code" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('track code is required') }}"
                                                        placeholder="Enter Track Code">{{ array_key_exists('track_code', $settings) ? $settings['track_code'] : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Google Analects</label>
                                                    <textarea type="text" name="google_analects" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('google analects is required') }}"
                                                        placeholder="Enter Google Analects">{{ array_key_exists('google_analects', $settings) ? $settings['google_analects'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Button Track Code</label>
                                                    <textarea type="text" name="btn_track_code" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('button track code is required') }}"
                                                        placeholder="Enter Track Code">{{ array_key_exists('btn_track_code', $settings) ? $settings['btn_track_code'] : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Button Google ID footer</label>
                                                    <textarea type="text" name="btn_google_id_footer" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('button google id footer is required') }}"
                                                        placeholder="Enter Google ID footer">{{ array_key_exists('btn_google_id_footer', $settings) ? $settings['btn_google_id_footer'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Tranfer Line</label>
                                                    <textarea type="text" name="transfer_line" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('transfer line is required') }}"
                                                        placeholder="Enter Google ID footer">{{ array_key_exists('transfer_line', $settings) ? $settings['transfer_line'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin5" aria-expanded="false"
                                        aria-controls="accordionMargin5">
                                        Thanks Page Data
                                    </button>
                                </h2>
                                <div id="accordionMargin5" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin5" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Thanks Title</label>
                                                    <input type="text" name="thanks_title" class="form-control"
                                                        placeholder="Enter Thanks Page Title" data-parsley-required
                                                        data-parsley-required-message="{{ __('thanks title is required') }}"
                                                        value="{{ array_key_exists('thanks_title', $settings) ? $settings['thanks_title'] : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Thanks Paragraph</label>
                                                    <textarea type="text" name="thanks_parag" class="form-control" rows="3" data-parsley-required
                                                        data-parsley-required-message="{{ __('thanks paragraph is required') }}"
                                                        placeholder="Enter Thanks Paragraph">{{ array_key_exists('thanks_parag', $settings) ? $settings['thanks_parag'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin6" aria-expanded="false"
                                        aria-controls="accordionMargin6">
                                        Email Content
                                    </button>
                                </h2>
                                <div id="accordionMargin6" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin6" data-bs-parent="#accordionMargin" style="">
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
                                                    <textarea type="text" name="email_template" class="form-control ckeditor"
                                                        rows="3">{{ array_key_exists('email_template', $settings) ? $settings['email_template'] : '' }}</textarea>

                                                        <small class="form-text text-muted">Be carefull use these variables in your template
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
                                <h2 class="accordion-header" id="headingMargin7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin7" aria-expanded="false"
                                        aria-controls="accordionMargin7">
                                        Mail Settings
                                    </button>
                                </h2>
                                <div id="accordionMargin7" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin7" data-bs-parent="#accordionMargin" style="">
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
                                                <input type="text" name="MAIL_ENCRYPTION" class="form-control"
                                                    placeholder="Enter mail encryption"
                                                    value="{{ array_key_exists('MAIL_ENCRYPTION', $settings) ? $settings['MAIL_ENCRYPTION'] : '' }}">
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
                            </div> --}}

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionMargin8" aria-expanded="false"
                                        aria-controls="accordionMargin8">
                                        Redirect To
                                    </button>
                                </h2>
                                <div id="accordionMargin8" class="accordion-collapse collapse"
                                    aria-labelledby="headingMargin8" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row my-2 mx-1">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    {{-- @dd($settings['redirect'] == true) --}}
                                                    <input type="checkbox" class="form-check-input" value="1"
                                                        name="redirect" id="redirect"
                                                        @if (array_key_exists('redirect', $settings)) {{ $settings['redirect'] == true ? 'checked' : '' }} @endif>
                                                    Redirect to another link ?
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row" id="url_input"
                                            @if (array_key_exists('redirect', $settings)) @if ($settings['redirect'] != true)
                                                    style="display: none" @endif
                                        @else style="display: none" @endif>
                                            <div class="col-12">
                                                <input type="text" name="redirect_url" class="form-control"
                                                    placeholder="Enter New Link"
                                                    value="{{ array_key_exists('redirect_url', $settings) ? $settings['redirect_url'] : '' }}">
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
@endpush
