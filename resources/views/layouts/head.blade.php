<!--begin::Head-->
<head>
    <title>Master Vision - The World's #1 Selling Bootstrap Admin Template - Master Vision by KeenThemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="Master Vision CRM" />
    <meta name="keywords" content="Master Vision CRM" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Master Vision - The World's #1 Selling Bootstrap Admin Template - Master Vision by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/Master Vision" />
    <meta property="og:site_name" content="Master Vision by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/Master Vision8" />
    <link rel="shortcut icon" href="{{ asset('new-theme/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @if ( app()->getLocale() == 'ar')
        <link href="{{ asset('new-theme/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('new-theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('new-theme/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    @if ( app()->getLocale() == 'ar')
        <link href="{{ asset('new-theme/assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-theme/assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('new-theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('new-theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<!--end::Head-->

@yield('css')
