@extends('backend.home-dark')

@section('title')
    {{ __('Main Settings') }}
@stop


@section('page-header')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Settings') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Main Settings') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            @include('backend.layouts.partials.session')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Main Settings') }}</h3>
                </div>
                <div class="card-body h-100">
                    <form class="needs-validation" autocomplete="off" action="{{ route('update-settings') }}"
                        method="post" autocomplete="off" enctype="multipart/form-data" id="form">
                        @csrf

{{--
                        <div id="accordionIcon" class="accordion accordion-without-arrow" data-toggle-hover="true">

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1"
                                        aria-expanded="false">
                                        Home Page Title
                                    </button>
                                </h2>

                                <div id="accordionIcon-1" class="accordion-collapse collapse"  data-bs-parent="#accordionIcon" style="">
                                    <div class="accordion-body">
                                        <div class="row row-sm mg-b-20">

                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="page_title" class="form-control" placeholder="Enter Home Page Title" value="{{ array_key_exists('page_title', $settings) ? $settings['page_title'] : '' }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2"
                                        aria-expanded="false">
                                        Image and Logo
                                    </button>
                                </h2>

                                <div id="accordionIcon-2" class="accordion-collapse collapse"  data-bs-parent="#accordionIcon" style="">
                                    <div class="accordion-body">
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="dropify" name="logo" data-height="200"  @if(array_key_exists('logo', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['logo']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("logo is required")}}' @endif>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label">Home Page Image</label>
                                                <input type="file" class="dropify" name="page_image" data-height="200"  @if(array_key_exists('page_image', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['page_image']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("favicon is required")}}' @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-3" aria-controls="accordionIcon-3"
                                        aria-expanded="false">
                                        Social Media
                                    </button>
                                </h2>

                                <div id="accordionIcon-3" class="accordion-collapse collapse"  data-bs-parent="#accordionIcon" style="">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="form-group">
                                                <label for="">{{__("Facebook link")}}</label>
                                                <input type="url" name="facebook_link" class="form-control" placeholder="{{ __('https://facebook.com') }}" value="{{ array_key_exists('facebook_link', $settings) ? $settings['facebook_link'] : '' }}" required>
                                            </div>

                                            <div class="form-group my-2">
                                                <label for="">{{__("Twitter link")}}</label>
                                                <input type="url" name="twitter_link" class="form-control" placeholder="{{ __('https://twitter.com') }}" value="{{ array_key_exists('twitter_link', $settings) ? $settings['twitter_link'] : '' }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">{{__("instgram link")}}</label>
                                                <input type="url" name="instgram_link" class="form-control" placeholder="{{ __('https://instgram.com') }}" value="{{ array_key_exists('instgram_link', $settings) ? $settings['instgram_link'] : '' }}" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> --}}


                        <div class="accordion accordion-margin" id="accordionMargin" data-toggle-hover="true">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin1" aria-expanded="false" aria-controls="accordionMargin1">
                                        Home Page Title
                                    </button>
                                </h2>
                                <div id="accordionMargin1" class="accordion-collapse collapse" aria-labelledby="headingMargin1" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="page_title" class="form-control" placeholder="Enter Home Page Title" value="{{ array_key_exists('page_title', $settings) ? $settings['page_title'] : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin2" aria-expanded="false" aria-controls="accordionMargin2">
                                        Image and Logo
                                    </button>
                                </h2>
                                <div id="accordionMargin2" class="accordion-collapse collapse" aria-labelledby="headingMargin2" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="dropify" name="logo" data-height="200"  @if(array_key_exists('logo', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['logo']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("logo is required")}}' @endif>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label">Home Page Image</label>
                                                <input type="file" class="dropify" name="page_image" data-height="200"  @if(array_key_exists('page_image', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['page_image']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("favicon is required")}}' @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMargin3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMargin3" aria-expanded="false" aria-controls="accordionMargin3">
                                        Image and Logo
                                    </button>
                                </h2>
                                <div id="accordionMargin3" class="accordion-collapse collapse" aria-labelledby="headingMargin3" data-bs-parent="#accordionMargin" style="">
                                    <div class="accordion-body">
                                        <div class="row row-sm mg-b-20">
                                            <div class="col-lg-6">
                                                <label class="form-label">Logo</label>
                                                <input type="file" class="dropify" name="logo" data-height="200"  @if(array_key_exists('logo', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['logo']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("logo is required")}}' @endif>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-label">Home Page Image</label>
                                                <input type="file" class="dropify" name="page_image" data-height="200"  @if(array_key_exists('page_image', $settings)) data-default-file="{{ asset('storage/images/settings/'.$settings['page_image']) }}" @else  data-parsley-required= true data-parsley-required-message='{{__("favicon is required")}}' @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                            <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">{{ __('Save') }}</button>
                            <a class="btn btn-danger waves-effect waves-float waves-light" href="{{ route('dashboard') }}"> {{ __('Back') }}</a>
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min') }}.js"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/components/components-accordion.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready(function() {
            $('#form').parsley();
        });
    </script>
@endpush
