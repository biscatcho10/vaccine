<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Melkin, Booking and Reservation form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Well Plus Compounding Pharmacy</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/logo_title.png') }}" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->

    <!-- BASE CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/rome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/DateTimePicker.css') }}" />
    <link href="{{ asset('frontend/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/jquery-nice-select-1.1.0/css/nice-select.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <style>
        .content-left-wrapper.bg_hotel:before {
            background: url({{ asset('storage/images/settings/' . $settings['page_image']) }}) center center no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            /* settings */
        }
    </style>

    {!! $settings['google_analects'] !!}
    {!! $settings['facebook_pixel'] !!}
    {!! $settings['google_id_head'] !!}
    {!! $settings['track_code'] !!}
</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <div class="container-fluid full-height">
        <div class="row row-height">
            <div class="col-lg-4 content-left">
                <div class="content-left-wrapper bg_hotel">
                    <div class="wrapper">
                        <a href="{{ route('index') }}" id="logo">
                            <img src="{{ asset('storage/images/settings/' . $settings['logo']) }}" alt="">
                        </a>
                        <div id="social">
                            <ul>
                                <li><a href="{{ $settings['facebook_link'] }}"><i class="social_facebook"></i></a>
                                </li>
                                <li><a href="{{ $settings['twitter_link'] }}"><i class="social_twitter"></i></a></li>
                                <li><a href="{{ $settings['instagram_link'] }}"><i class="social_instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /social -->
                        <!-- content text  -->
                        <div class="content_text">
                            <p>{{ $settings['page_title'] }}</p>
                        </div>
                        <!-- content text  -->
                        <!-- Footer -->
                        <footer>
                            <span class="text-center">© Copy Right 2022 Well Pharmacy, All Right Reserved.</span>
                            <span>Powerd By Creative Twinkles</span>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
                <!--/content-left-wrapper -->
            </div>
            <!-- /content-left -->

            <div class="col-lg-8 content-right" id="start">
                @include('backend.layouts.partials.session')

                <div id="wizard_container">
                    <!-- /top-wizard -->
                    <form action="{{ route('make.request') }}" id="wrapped" method="POST" onkeydown="return event.key != 'Enter';" onsubmit="
                        if (document.querySelector('.oneCheckBox .checkBox').checked == false && document.querySelector('.oneCheckBox.active')){
                            event.preventDefault()
                        }else{
                            return true
                        }">
                        @csrf
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            @include('frontend.vaccine')
                            <!-- /step-->

                            @include('frontend.user')
                            <!-- /step-->

                            @include('frontend.eligapilities')
                            <!-- /step-->

                            @include('frontend.questions')
                            <!-- /step-->

                            @include('frontend.conditions')
                            <!-- /step-->
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backwards">Prev</button>
                            <button type="button" name="forward" class="forwards">Next</button>
                            <button type="submit"
                            {!! $settings['btn_track_code'] !!}
                            {!! $settings['btn_google_id_footer'] !!}
                            {!! $settings['transfer_line'] !!}
                            name="process" class="submits">Submit</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
                <!-- Footer -->
                <footer>
                    <span class="text-center">© Copy Right 2022 Well Pharmacy, All Right Reserved.</span>
                    <span>
                        <a target="_blank" href="https://www.creativetwinkles.com/">Powerd By Creative Twinkles</a>
                    </span>
                </footer>
                <!-- Footer -->
            </div>
            <!-- /content-right-->
        </div>
        <!-- /row-->
    </div>
    <!-- /container-fluid -->

    @include('frontend.scripts')

    {!! $settings['google_id_footer'] !!}
</body>

</html>
