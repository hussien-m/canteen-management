<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>وجبات الطلاب | الادارة</title>
    <link rel="apple-touch-icon" href="{{asset('dash-rtl/')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dash-rtl/')}}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <link href="http://www.liulichao.com/stack-admin-1.0/app-assets/fonts/flag-icon-css/css/flag-icon.min.css"
          rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <!-- BEGIN VENDOR CSS-->

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/vendors.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/extensions/sweetalert.css">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/vendors.css">
    @endif
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/weather-icons/climacons.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/fonts/meteocons/style.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/charts/morris.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/charts/chartist.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">

        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
    <style>
        div.dataTables_wrapper {
            direction: rtl;
        }

        /* Ensure that the demo table scrolls */
        th, td { white-space: nowrap; }
        div.dataTables_wrapper {
            width: 800px;
            margin: 0 auto;
        }
    </style>
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/app.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/custom-rtl.css">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/fonts/simple-line-icons/style.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/pages/timeline.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/pages/dashboard-ecommerce.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/app-assets/css-rtl/plugins/file-uploaders/dropzone.css')}}">

        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/assets/css/style-rtl.css">
    <!-- END Custom CSS-->
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/vendors/css/weather-icons/climacons.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/fonts/meteocons/style.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/app.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/custom.css">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/fonts/simple-line-icons/style.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/pages/timeline.css">
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css/pages/dashboard-ecommerce.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/assets/css/style.css">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/core/colors/palette-switch.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dash-rtl/')}}/app-assets/css-rtl/plugins/forms/switch.css">


<style>
    .avatar img {
        height: 37px;
    }
    button.dt-button:first-child, div.dt-button:first-child, a.dt-button:first-child, input.dt-button:first-child {
    margin-left: 0;
    background-color: blue;
    color: #ffff;
    font-weight: bold;
}
</style>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

</head>
