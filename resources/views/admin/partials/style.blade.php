<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 5/7/2018
 * Time: 4:12 PM
 */
?>
@push('styleMain')
    <!-- Bootstrap -->
    <link href="{{asset_vendors('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{asset_vendors('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- NProgress -->
    <link href="{{asset_vendors('nprogress/nprogress.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset_vendors('iCheck/skins/flat/green.css')}}" rel="stylesheet" type="text/css" />

    <!-- bootstrap-fileinput -->
    <link href="{{asset_vendors('bootstrap-fileinput/css/fileinput.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap-progressbar -->
    <link href="{{asset_vendors('bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- JQVMap -->
    <link href="{{asset_vendors('jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset_vendors('bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset_vendors('switchery/dist/switchery.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
    @push('cssString')
        <style type="text/css">
            #check-all {
                zoom: 1.5;
            }

            .check-all {
                zoom: 1.5;
            }

            .check-one {
                zoom: 1.5;
            }

            .vertical-middle {
                vertical-align: middle !important;
            }
        </style>
    @endpush
@endpush
