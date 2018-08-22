<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="{{config('app.locale')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{setting("seo_keyword")}}" />
    <meta name="description" content="{{setting("seo_description")}}" />
    <title>{{setting(KEY_WEBSITE_NAME)}} - {{setting(KEY_WEBSITE_DESCRIPTION)}}</title>
    <meta property="fb:app_id" content="{{ env('FB_APP_ID') ?? '' }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type"   content="website" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta name="robots" content="noodp,index,follow" />
    <meta property="og:site_name" content="{{ $heading or '' }}" />
    <meta property="og:title"  content="{{ $heading or '' }}" />
    <meta property="og:description"  content="{{ $description or '' }}" />
    <meta property="og:image"  content="{{\App\Commons\Facade\CFile::getImageUrl('settings', setting(KEY_LOGO))}}" />
    <link rel="canonical" href="{{ Request::url() }}" />

    @stack('styleMain')
    @stack('cssFile')
    @stack('cssString')
    <style type="text/css">
        /*Box product in page post*/
        #box_lydo {
            background: #bde6ff;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #box_lydo .header_lydo {
            padding: 1px 0;
            border-bottom: 3px solid #0074bc;
            font-size: 18px;
            margin-bottom: 12px;
            color: red;
            font-weight: bold;
        }

        #box_lydo .img img {
            width: 75%;
            height: auto;
            display: table;
            margin: 0 auto;
            padding-top: 5%;
        }

        #content img {
            max-width: 100%;
            height: auto;
        }

        #box_lydo p {
            margin-bottom: 5px !important;
        }

        #box_lydo ul {
            padding-left: 0;
        }

        #box_lydo ul li {
            font-size: 86%;
            padding-bottom: 6px;
            list-style: disc!important;
        }

        #box_lydo .btn {
            border-radius: 0;
            background: #0074bc;
            color: #fff !important;
        }

        /*Box product in page post*/

        /*Relate post in page post*/
        .posts_concern {
            background: #2155a4;
            padding: 3px 10px;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        /*Relate post*/
    </style>
</head>

