<!DOCTYPE html>
<html lang="en">
@include('app.partials.style')
@stack('cssFile')
@stack('cssString')
@include('app.partials.script')
@include('app.partials.menu')
@include('app.partials.header')
<body>
@stack('menu_left')
<!-- page content -->
@yield('content')
<!-- /page content -->
@yield('mainContent')
@include('app.partials.footer')

@stack("scriptFile")
@stack('scriptString')

</body>
</html>