
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{ setting('application_name') }} "/>
    <meta property="og:title" content="{{ setting('application_name') }} "/>
    <meta property="og:description" content="{{ setting('application_name') }} "/>
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="format-detection" content="telephone=no">
    <title>{{ setting('application_name') }} | @yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/images/favicon.png') }}">

    <link href="{{ asset('dashboard/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('dashboard/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('dashboard/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('dashboard/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/pickadate/themes/default.date.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/select2/css/select2.min.css') }}">
    <link href="{{ asset('dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

    <!-- Start izitoast css-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" rel="stylesheet"/>
    <!-- End izitoast css-->


    <link
        href="https://fonts.googleapis.com/css2?family=Cairo+Slab:wght@400;600;700&family=Cairo:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        body, small, a, p,.blockquote ,.post-quote blockquote,.lang-label,.pricing-box-alt,.pullquote-left,.pullquote-right, span .sub-menu-container .menu-item > .menu-link, .wp-caption, .fbox-center.fbox-italic p, .skills li .progress-percent .counter, .nav-tree ul ul a, .font-body, h1, h2, h3, h4, h5, h6, #logo a, .menu-link, .mega-menu-style-2 .mega-menu-title > .menu-link, .top-search-form input, .entry-link, .entry.entry-date-section span, .button.button-desc, .fbox-content h3, .tab-nav-lg li a, .counter, label, .widget-filter-links li a, .nav-tree li a, .wedding-head, .entry-link span, .entry blockquote p, .more-link, .comment-content .comment-author span, .comment-content .comment-author span a, .button.button-desc span, .testi-content p, .team-title span, .before-heading, .wedding-head .first-name span, .wedding-head .last-name span, .font-secondary {
            font-family: 'Cairo', 'Open Sans', sans-serif !important;
        }
    </style>



    @stack('css')
</head>
