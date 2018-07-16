<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{setting(KEY_WEBSITE_NAME)}} | {{setting(KEY_WEBSITE_DESCRIPTION)}}</title>
    @stack('styleMain')
</head>

