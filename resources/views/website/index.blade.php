<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
@include('website.partials.style')
@stack('cssFile')
@stack('cssString')
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
</style>
<a class="hidden-sm-down" id="icon_order_fix" href="{{url('dat-hang')}}">
    <img src="{{asset_uploads('www/icon-cart.png')}}">
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
	"@context": "https://schema.org/ProfessionalService",
  	"@type": "{{setting(KEY_WEBSITE_NAME)}}",
	"url": "http://everonlongbien.com.vn/",
	"logo": "http://everonlongbien.com.vn/uploads/anh_dai_dien_bai_viet/logo-everon.png",
	"hasMap": "https://www.google.com/maps/place/%C4%90%E1%BA%A1i+l%C3%BD+EVERON+Nguy%E1%BB%85n+V%C4%83n+C%E1%BB%AB/@21.0476489,105.8770703,17z/data=!3m1!4b1!4m5!3m4!1s0x3135a97ef9778361:0x731d039cc7fee20b!8m2!3d21.0476439!4d105.879259",
	"email": "mailto:everonngogiatu@gmail.com			",
  	"address": {
    	"@type": "PostalAddress",
    	"addressLocality": "Long Biên",
    	"addressRegion": "Hà Nội",
    	"postalCode":"100000",
    	"streetAddress": "439 Nguyễn Văn Cừ"
  	},
  	"description": "Đại lý Chăn Ga Gối Đệm Everon tại 47 Ngô Gia Tự, Long Biên, Hà Nội. Với diện tích trưng bày rộng lớn đầy đủ các mẫu sản phẩm mới nhất của Everon để thỏa mã như cầu mua sắm của khách hàng.",
	"name": "Everon Long Biên",
  	"telephone": "0966.452.111 - 024.3999.4555",
  	"openingHours": [ "Mo-Sa 07:00-23:00", "Sun 08:00-22:00" ],
  	"geo": {
    	"@type": "GeoCoordinates",
   	"latitude": "21.05",
    	"longitude": "105.87"
 		},
  	"sameAs" : [ "https://www.facebook.com/everonngogiatu/",
    	"https://www.youtube.com/c/everonngogiatu",
    	"https://twitter.com/everonngogiatu",
		"https://www.instagram.com/everonngogiatu"
			"https://www.youtube.com/c/everonngogiatu"
			"https://www.linkedin.com/company/everonngogiatu"
			"https://www.pinterest.com/everonngogiatu"
			"https://soundcloud.com/everonngogiatu"
			"https://plus.google.com/+Geveronngogiatu"
			"https://myspace.com/everonngogiatu"
			"http://everonngogiatu.tumblr.com/"]
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

</body>
</html>