<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
@include('website.partials.style')
@include('website.partials.script')
@include('website.partials.header')
<body>
<style>
    #icon_order_fix {
        position: fixed;
        top: 50%;
        z-index: 100000;
        right: 0;
    }

    #icon_order_fix img {
        width: 80px;
        height: auto;
    }

    #icon_phone_fix {
        position: fixed;
        top: 50%;
        z-index: 100000;
        left: 0;
    }

    #icon_phone_fix img {
        width: 80px;
        height: auto;
    }
</style>
<a class="hidden-sm-down" id="icon_phone_fix" href="tel::{{setting("website_telephone")}}">
    <img src="{{asset_uploads('www/icon-phone.png')}}">
</a>
<a class="hidden-sm-down" id="icon_order_fix" href="{{url('dat-hang')}}">
    <img src="{{asset_uploads('www/icon-cart.png')}}" alt="@lang('website.cart')">
</a>

<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js,
            fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js     = d.createElement(s);
        js.id  = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=393413527780669&autoLogAppEvents=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));
</script>
<script type="application/ld+json">
	{
	"@context": "https://schema.org",
  	"@type": "LocalBusiness",
	"url": "{{url("/")}}",
	"logo": "{{\App\Commons\Facade\CFile::getImageUrl('settings', setting(KEY_LOGO))}}",
	"hasMap": "{{setting("_google_map_link")}}",
	"email": "mailto:{{setting(KEY_ADMIN_EMAIL)}}",
	"image": "{{\App\Commons\Facade\CFile::getImageUrl('settings', setting("website_image"))}}",
  	"address": {
    	"@type": "PostalAddress",
    	"addressLocality": "{{setting('company_district')}}",
    	"addressRegion": "{{setting('company_city')}}",
    	"postalCode":"{{setting('company_postal_code')}}",
    	"streetAddress": "{{setting('company_street')}}"
  	},
  	"description": "{{setting(KEY_WEBSITE_DESCRIPTION)}}",
	"name": "{{setting(KEY_WEBSITE_NAME)}}",
  	"telephone": "{{setting(\App\Models\Setting::KEY_WEBSITE_PHONE)}} - {{setting("website_fax")}} - {{setting("website_hotline")}}",
  	"geo": {
    	"@type": "GeoCoordinates",
   	    "latitude": "{{setting("company_lat")}}",
    	"longitude": "{{setting("company_long")}}"
    },
  	"sameAs" : [
            "{{setting("_social_facebook")}}",
            "{{setting("_social_youtube")}}",
            "{{setting("_social_whatsapp")}}",
            "{{setting("_social_twitter")}}",
    		"{{setting("_social_instagram")}}"
        ]
	}


</script>
@include('website.partials.topbar')
@include('website.partials.menu')
<!-- page content -->
<!-- EVENTS -->
@php
    /** @var \Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception */
@endphp

@if(isset($exception) && !empty($exception) && $exception->getStatusCode() != 200)
    @yield('error')
@else
    @if($current_method == 'index')
        @yield('content')
    @else
        <!--Page Header-->
        {{--<section class="page_header padding-top">--}}
        {{--<div class="container">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-12 page-content">--}}
        {{--<h1>Student Courses</h1>--}}
        {{--<p>We offer the most complete house renovating services in the country</p>--}}
        {{--<div class="page_nav">--}}
        {{--<span>You are here:</span> <a href="index.html">Home</a>--}}
        {{--<span><i class="fa fa-angle-double-right"></i>Courses</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}
        <!--Page Header-->
        <section id="event_detail" class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 event wow fadeIn" data-wow-delay="200ms">
                        @include('website.partials.breadcrumb')
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
@endif

<!-- EVENTS ends -->
<!-- /page content -->

@include('website.partials.footer')
@includeWhen(!empty($banner_bottom_left), 'website.partials.banner-bottom-left')
@stack("scriptFile")
@stack('scriptString')
<!--FOOTER ends-->
<script lang="javascript">var _vc_data = {id: '{{setting('_vchat_hash')}}', secret: '{{setting('_vchat_data')}}'};
    (function () {
        var ga   = document.createElement("script");
        ga.type  = "text/javascript";
        ga.async = true;
        ga.defer = true;
        ga.src   = "//live.vnpgroup.net/client/tracking.js?id=5780231";
        var s    = document.getElementsByTagName("script");
        s[0].parentNode.insertBefore(ga, s[0]);
    })();</script>
</body>
</html>