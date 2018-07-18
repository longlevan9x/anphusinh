<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{setting(KEY_WEBSITE_NAME)}} | {{setting(KEY_WEBSITE_DESCRIPTION)}}</title>
    @stack('styleMain')
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

