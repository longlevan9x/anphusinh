<!DOCTYPE html>
<html lang="en">
@include('website.partials.style')
@stack('cssFile')
@stack('cssString')
@include('website.partials.script')
@include('website.partials.header')
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js,
            fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js     = d.createElement(s);
        js.id  = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=393413527780669&autoLogAppEvents=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));</script>
@include('website.partials.topbar')
@include('website.partials.menu')
<!-- page content -->
<!-- EVENTS -->
@if($current_method == 'index')
    @yield('content')
@else
    <!--Page Header-->
    <section class="page_header padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <h1>Student Courses</h1>
                    <p>We offer the most complete house renovating services in the country</p>
                    <div class="page_nav">
                        <span>You are here:</span> <a href="index.html">Home</a>
                        <span><i class="fa fa-angle-double-right"></i>Courses</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header-->
    <section id="event_detail" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 event wow fadeIn" data-wow-delay="500ms">
                    @yield('content')
                    <div class="col-md-12">
                        <div class="fb-comments" data-width="100%" data-href="{{url()->current()}}" data-numposts="5"></div>
                    </div>
                </div>
                @include('website.partials.aside')
            </div>
        </div>
    </section>
@endif
<!-- EVENTS ends -->
<!-- /page content -->

@include('website.partials.footer')

@stack("scriptFile")
@stack('scriptString')

</body>
</html>