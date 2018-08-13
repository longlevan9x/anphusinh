@extends('website.index')
@section("content")
    @php
        /** @var \App\Models\Post $slide */
        /** @var \App\Models\Category $category */
        /** @var \App\Models\Post $share */
        /** @var \App\Models\Post $postNew */
        /** @var \App\Models\Product $product */
    @endphp
    <style type="text/css">
        .padding-top-50 {
            padding-top: 50px;
        }

        .padding-top-20 {
            padding-top: 20px;
        }

        .padding-bottom-50 {
            padding-bottom: 50px;
        }

        .padding-bottom-20 {
            padding-bottom: 20px;
        }
    </style>
    <!--Slider-->
    <section class="rev_slider_wrapper text-center" style="top: 13.7%;">
        <!-- START REVOLUTION SLIDER 5.0 auto mode -->
        <div id="rev_slider" class="rev_slider" data-version="5.0">
            <ul>
                <!-- SLIDE  -->
                @foreach($slides as $slide)
                    @php
                        $href = '';
                        if (filter_var($slide->slug, FILTER_VALIDATE_URL)) {
                            $href = $slide->slug;
                        }
                        else {
                            if (!empty($slide->parent_id)) {
                                $href = url($slide->slug);
                            }
                        }
                    @endphp
                    <li data-transition="fade">
                        <!-- MAIN IMAGE -->
                        <img src="{{$slide->getImagePath()}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['326','270','270','150']" data-voffset="['0','0','0','0']"
                             data-responsive_offset="on"
                             data-visibility="['on','on','on','on']"
                             data-transform_idle="o:1;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="800"><h2 style="color: white;font-size: 40px">{{$slide->title}}</h2>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['380','340','300','350']" data-voffset="['0','0','0','0']"
                             data-responsive_offset="on"
                             data-visibility="['on','on','off','off']"
                             data-transform_idle="o:1;"
                             data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-start="1500">
                            <p>{{$slide->overview}}</p>
                        </div>
                        <div class="tp-caption  tp-resizeme"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['450','390','350','250']" data-voffset="['0','0','0','0']"
                             data-responsive_offset="on"
                             data-visibility="['on','on','on','on']"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                             data-start="2000">
                            @if(!empty($href))
                                <a href="{{$href}}" class="border_radius btn_common blue">@lang('website.visit now')</a>
                            @endif
                        </div>
                    </li>
            @endforeach
            <!-- END REVOLUTION SLIDER -->
            </ul>
        </div><!-- END REVOLUTION SLIDER -->
    </section>



    <!--ABout US-->
    <section id="about" class="" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading bottom25">@lang('website.latest news') <span class="divider-left"></span></h2>
                </div>
                <div class="icon_wrap clearfix">
                    @forelse($postNews as $postNew)
                        <div class="col-sm-4 col-xs-6 icon_box text-center wow fadeInUp postNews" data-wow-delay="100ms" href="{{$postNew->getSlugAndId()}}" style="margin-bottom: 15px;padding-bottom: 10px;">
                            <div class="image bottom20" style="width: 50%;margin: 0 auto;">
                                <img src="{{$postNew->getImagePath()}}" title="{{$postNew->title}}" alt="{{$postNew->title}}" class="img-responsive border_radius">
                            </div>
                            <h4 class="text-capitalize bottom20 margin10" title="{{$postNew->title}}">{{str_limit($postNew->title, 37)}}</h4>
                            <p class="no_bottom">{{str_limit($postNew->overview, 70)}}</p>
                        </div>
                    @empty
                    @endforelse
                    @push('scriptString')
                        <script type="text/javascript">
                            $(function () {
                                $(".postNews").click(function () {
                                    window.location.href = $(this).attr("href");
                                });
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="col-md-7 col-sm-6 priorty wow fadeInLeft" data-wow-delay="300ms">
                    <h2 class="heading bottom25">@lang('website.product') <span class="divider-left"></span></h2>
                    <p class="half_space">{{$product->overview}}</p>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="about-post col-xs-6">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/hands.png')}}" alt="hands"></a>
                                <h4>Good Planning</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                            <div class="about-post col-xs-6">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/awesome.png')}}" alt="hands"></a>
                                <h4>Happy Students</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="about-post col-xs-6">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/maintenance.png')}}" alt="hands"></a>
                                <h4>Our Courses</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                            <div class="about-post col-xs-6">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/home.png')}}" alt="hands"></a>
                                <h4>Our Teachers</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 wow fadeInRight" data-wow-delay="300ms">
                    <img src="{{$product->getImagePath()}}" alt="our priorties" class="img-responsive" style="width:100%;">
                </div>
            </div>
        </div>
    </section>
    <!--ABout US-->


    <style>

        body .page-section#section-chuyen-gia {
            position: relative;
            overflow: hidden;
        }

        body .page-section {
            padding: 50px 0;
            background-size: cover;
            background: #fff no-repeat center center;
            position: relative;
        }

        body .page-section#section-chuyen-gia:before {
            position: absolute;
            height: 40px;
            width: 126px;
            /*url(../img/section-arrow2.png)*/
            background: no-repeat top center/auto 100%;
            content: '';
            top: 0;
            left: 50%;
            margin-left: -63px;
        }

        body .page-section#section-chuyen-gia .border-cloud {
            background: url({{asset_uploads('www/cloud.png')}}) no-repeat center center/100% auto;
            text-align: center;
            height: 135px;
        }

        body .page-section#section-chuyen-gia .border-cloud .section-heading {
            font-weight: normal;
            text-transform: none;
            margin: 0;
        }

        body .page-section .section-heading {
            margin: 10px 0 30px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 2.5rem;
        }

        .w-100 {
            width: 100% !important;
        }

        body .text-blue {
            color: #0073bc;
        }

        .text-center {
            text-align: center !important;
        }

        .mb-1 {
            margin-bottom: 0.25rem !important;
        }

        .mt-0 {
            margin-top: 0 !important;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        body .page-section#section-chuyen-gia .doctor-comment {
            background: url('{{\App\Commons\Facade\CFile::getImageUrl('settings', setting('_expert_thumbnail'))}}') no-repeat bottom right / 70% auto;
            min-height: 400px;
        }

        .pt-5 {
            padding-top: 3rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        body .page-section#section-chuyen-gia .doctor-comment .blockquote {
            border: 0;
            padding: 0;
            position: relative;
        }

        body .page-section#section-chuyen-gia .doctor-comment .blockquote:before {
            content: '"';
            font-size: 80px;
            position: absolute;
            top: 10px;
            left: 0;
            font-family: 'Times New Roman';
            font-style: italic;
            line-height: 30px;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .animated {
            -webkit-animation-duration: 1.3s;
            animation-duration: 1.3s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @media (min-width: 768px) {

            .hidden-md-up {
                display: none !important;
            }

            .text-left {
                text-align: left !important;
            }

            .pl-1 {
                padding-left: 0.25rem !important;
            }
        }

        .w-50 {
            width: 50% !important;
        }

        body .page-section {
            padding: 50px 0;
            background-size: cover;
            background: #f3f3f3 no-repeat center center;
            position: relative;
        }

        @media (min-width: 1200px) {

            body .page-section .section-heading {
                margin: 10px 0 30px;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 2.5rem;
            }

            body .text-blue {
                color: #0073bc;
            }
        }

        @media (min-width: 1200px) {
            .fadeInLeft {
                -webkit-animation-name: fadeInLeft;
                animation-name: fadeInLeft;
            }

            .animated {
                -webkit-animation-duration: 1.3s;
                animation-duration: 1.3s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }

            .text-center {
                text-align: center !important;
            }
        }

        @media (min-width: 1200px) {

            .zoomIn {
                -webkit-animation-name: zoomIn;
                animation-name: zoomIn;
            }

            .animated {
                -webkit-animation-duration: 1.3s;
                animation-duration: 1.3s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
        }

        @media (min-width: 1200px) {
            .fadeInRight {
                -webkit-animation-name: fadeInRight;
                animation-name: fadeInRight;
            }
        }

    </style>
    <section id="section-chuyen-gia" class="page-section bg-blue2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-cloud d-flex justify-content-center align-items-center mb-md-5 mb-3" style="margin-bottom: 40px">
                        <a href="{{url('chuyen-gia')}}">
                            <h2 class="section-heading text-blue font-weight-normal" style="line-height: 3.7em">Ý kiến chuyên gia </h2>
                        </a>
                    </div>
                    @php
                        $urlVideo = setting('_expert_video');
                        if (\Illuminate\Support\Str::startsWith($urlVideo, 'https://www.youtube.com/')) {
                            $urlVideo = substr($urlVideo, strpos($urlVideo, '='));
                            $listUrl = explode("=", $urlVideo);
                            if (count($listUrl) > 1) {
                                $urlVideo = $listUrl[1];
                                if (strpos($urlVideo, '&') !== false) {
                                    $urlVideo1 = substr($urlVideo, strpos($urlVideo, '&'));
                                    $urlVideo = str_replace($urlVideo1, '', $urlVideo);
                                }
                            }
                        }

                    @endphp
                    <div class="box-video">
                        <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{$urlVideo}}" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <style type="text/css">
                    .blockquote_content {
                        -vendor-animation-duration: 5s;
                        -vendor-animation-delay: 4s;
                        -vendor-animation-iteration-count: infinite;
                        font-size: 1.25rem;
                        color: #0073bc;
                    }

                    .blockquote_content::after {
                        content: '"';
                        font-size: 80px;
                        position: absolute;
                        font-family: 'Times New Roman';
                        font-style: italic;
                        line-height: 30px;
                        bottom: -20px;
                        right: 0;
                    }

                    .block_quote::after {
                        content: '' !important;
                    }
                </style>
                <div class="col-md-6 text-blue text-center">
                    <p class="mt-0 mb-1 h1 title_mobile">{{setting('_expert_name')}}</p>
                    <p class="font-weight-bold">{{setting('_expert_workplace')}}</p>
                    <div class="doctor-comment row" style="background: url('{{\App\Commons\Facade\CFile::getImageUrl('settings', setting('_expert_thumbnail'))}}') no-repeat bottom right/50% auto;">
                        <div class="col-md-6 col-12 pt-5 mt-5 xs-m-0 xs-p-0 col-xs-6">
                            <div class="blockquote block_quote">
                                <p class="blockquote_content scrollpoint sp-fadeIn active animated fadeIn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! setting('_expert_quote')  !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses -->
    <section id="courses" class="padding parallax" style="padding-top: 50px; padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading heading_space wow fadeInDown" style="font-family:'Simplesnailsver'; font-size: 1.7em;color: #4587d9;">Bạn có biết
                        <span style="text-transform: uppercase; font-weight: bold;color: red;">90%</span> trẻ em ở Việt Nam chưa được chăm sóc da đúng cách?.
                        <span class="divider-left"></span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_wrapper">
                        <div id="course_slider" class="owl-carousel">
                            @forelse($categories as $category)
                                <div class="item">
                                    <div class="image bottom20">
                                        <img src="{{$category->getImagePath()}}" alt="Courses" class="img-responsive border_radius">
                                    </div>
                                    <h3 class="bottom15" style="text-align: center;color: #4587d9;">
                                        <a href="{{url($category->slug)}}">{{$category->name}}</a></h3>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses -->

    <!--Paralax -->
    <section id="parallax" class="parallax" style="background: #4587d9;padding: 2%">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow bounceIn">
                    <h2>@lang('website.ban muon mua san pham cua chung toi')</h2>
                    <h1 class="margin10" style="font-size: 3.563em">{{$product->name}}</h1>
                    <div class="image bottom20" style="width: 25%;margin: 0 auto;">
                        <img src="{{$product->getImagePath()}}" title="{{$product->name}}" alt="{{$product->name}}" class="img-responsive border_radius">
                    </div>
                    <a href="{{url('dat-hang')}}" class="border_radius btn_common white_border margin10">@lang('website.order now')</a>
                </div>
            </div>
        </div>
    </section>
    <!--Paralax -->
    @includeWhen(!empty($shares), 'website.home.template.share')

    <!--Contact Deatils -->
    <section id="contact" class="padding-top-50">
        <div class="container">
            <div class="row padding-bottom">
                <div class="col-md-8 wow fadeInRight" data-wow-delay="300ms">
                    <h2 class="heading heading_space" style="text-transform: uppercase">@lang('website.contact us')
                        <span class="divider-left"></span></h2>
                    <p> @lang('website.Just leave the information, we will contact and advise you directly')</p>
                    {{Form::open(['url' => url('lien-he'), 'id' => 'contact-form', 'class' => 'form-inline findus', 'onSubmit' => "return false", 'style' => "padding-top: 5px;"])}}
                    <div class="row">
                        <div class="col-md-12">
                            <div id="result"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="@lang('admin/common.name')" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="@lang('admin/common.phone number')" name="phone" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="@lang('admin.question')" name="question" rows="2" id="message"></textarea>
                            <button class="btn_common yellow border_radius" id="btn_submit_contact">@lang('website.send question')</button>
                        </div>
                    </div>
                    {{Form::close()}}

                    <ul class="social_icon black top30">
                        <li>
                            <a href="{{setting("_social_facebook") ?? '#'}}" class="facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="{{setting("_social_twitter") ?? '#'}}" class="twitter"><i class="icon-twitter4"></i></a>
                        </li>
                        <li>
                            <a href="{{setting("_social_youtube") ?? '#'}}" class="dribble"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="{{setting("_social_whatsapp") ?? '#'}}" class="instagram"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="{{setting("_social_google_plus") ?? '#'}}" class="instagram"><i class="fa fa-google-plus"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 contact_address heading_space wow fadeInLeft" data-wow-delay="1000ms">
                    <h2 class="heading heading_space">Hoặc<span class="divider-left"></span></h2>
                    <p></p>
                    <div class="address col-xs-12">
                        <i class="icon icon-map-pin border_radius"></i>
                        <h4>@lang('admin/common.address')</h4>
                        <p>{{setting(\App\Models\Setting::KEY_WEBSITE_ADDRESS)}}</p>
                    </div>
                    <div class="address col-xs-12">
                        <i class="icon icon-mail border_radius"></i>
                        <h4>@lang('Email')</h4>
                        <p><a href="mailto:Edua@info.com">{{setting(\App\Models\Setting::KEY_ADMIN_EMAIL)}}</a></p>
                    </div>
                    <div class="address col-xs-12">
                        <i class="icon icon-phone4 border_radius"></i>
                        <h4>@lang('admin/common.phone')</h4>
                        <p>{{setting(\App\Models\Setting::KEY_WEBSITE_PHONE)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Deatils -->


@endsection