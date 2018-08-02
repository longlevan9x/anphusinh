@extends('website.index')
@section("content")
    @php
        /** @var \App\Models\Post $slide */
        /** @var \App\Models\Category $category */
        /** @var \App\Models\Post $share */
    @endphp
    <!--Slider-->
    <section class="rev_slider_wrapper text-center" style="top: 19%;">
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
                             data-start="800"><h1>{{$slide->title}}</h1>
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
                                <a href="{{$href}}" class="border_radius btn_common blue">Get a quote</a>
                            @endif
                        </div>
                    </li>
            @endforeach
            <!-- END REVOLUTION SLIDER -->
            </ul>
        </div><!-- END REVOLUTION SLIDER -->
    </section>



    <!--ABout US-->
    <section id="about" class="padding">
        <div class="container">
            <div class="row">
                <div class="icon_wrap padding-bottom-half clearfix">
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="300ms">
                        <i class="icon-icons9"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="400ms">
                        <i class="icon-icons9"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="500ms">
                        <i class="icon-icons20"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="600ms">
                        <i class="icon-globe"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="400ms">
                        <i class="icon-layers"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                    <div class="col-sm-4 icon_box text-center heading_space wow fadeInUp" data-wow-delay="500ms">
                        <i class="icon-laptop"></i>
                        <h4 class="text-capitalize bottom20 margin10">Unlimited Features</h4>
                        <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container margin_top">
            <div class="row">
                <div class="col-md-7 col-sm-6 priorty wow fadeInLeft" data-wow-delay="300ms">
                    <h2 class="heading bottom25">Welcome to Edua Theme <span class="divider-left"></span></h2>
                    <p class="half_space">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>consectetur id. Aenean sit amet massa eu velit commodo cursus fringilla a tellus. Morbi eros urna, mollis porta feugiat non, ornare eu augue.
                        Sed rhoncus est sit amet diam tempus, et tristique est vive, sectur at dapibus id, luctus at odio. Proin mattis congue tristique
                        eu augue. Sed rhoncus est.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about-post">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/hands.png')}}" alt="hands"></a>
                                <h4>Good Planning</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                            <div class="about-post">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/awesome.png')}}" alt="hands"></a>
                                <h4>Happy Students</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-post">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/maintenance.png')}}" alt="hands"></a>
                                <h4>Our Courses</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                            <div class="about-post">
                                <a href="#." class="border_radius"><img src="{{asset_website('images/home.png')}}" alt="hands"></a>
                                <h4>Our Teachers</h4>
                                <p>Renean sit amet massa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 wow fadeInRight" data-wow-delay="300ms">
                    <img src="{{asset_website('images/about.jpg')}}" alt="our priorties" class="img-responsive" style="width:100%;">
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
            background-color: #fff;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

        body .page-section#section-chuyen-gia:before {
            position: absolute;
            height: 40px;
            width: 126px;
            background: url(../img/section-arrow2.png) no-repeat top center/auto 100%;
            content: '';
            top: 0;
            left: 50%;
            margin-left: -63px;
        }

        body .page-section#section-chuyen-gia .border-cloud {
            background: url(../img/cloud.png) no-repeat center center/100% auto;
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
            background: url(../img/doctor-human.png) no-repeat bottom right/70% auto;
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
            font-family: 'Roboto';
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

    </style>
    <section id="section-chuyen-gia" class="page-section bg-blue2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-cloud d-flex justify-content-center align-items-center mb-md-5 mb-3">
                        <a href="http://bottamnhanhung.vn/chuyen-gia">
                            <h2 class="section-heading text-blue font-weight-normal">
                                Ý kiến chuyên gia </h2></a>
                    </div>
                    <div class="box-video">
                        <iframe class="w-100" height="315" src="https://www.youtube.com/embed/FB4EbSH6vts" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6 text-blue text-center">
                    <p class="mt-0 mb-1 h1 title_mobile">Bác sĩ Nguyễn Văn Lộc</p>
                    <p class="font-weight-bold">Nguyên phó giám đốc Bệnh viện Nhi Trung ương</p>
                    <div class="doctor-comment row" style="background: url(http://bottamnhanhung.vn/assets/uploads/thumbs/doctor-human42611051095212_9315890.png) no-repeat bottom right/70% auto;">
                        <div class="col-md-6 col-12 pt-5 mt-5 xs-m-0 xs-p-0">
                            <div class="blockquote block_quote">
                                <p class="h5 font-weight-bold"></p>
                                <p class="blockquote_content scrollpoint sp-fadeIn active animated fadeIn">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-weight:500;">&nbsp;Bột tắm Nhân Hưng</i> có tác dụng se da rất nhanh, đặc biệt là giúp ngăn cản sự phát triển của vi khuẩn, siêu vi trùng, nấm. Do đó, các bà mẹ nên dùng bột tắm này tắm cho trẻ, nhất là những trẻ bị bệnh ngoài da.&nbsp;
                                </p>
                                <style type="text/css">
                                    .blockquote_content {
                                        -vendor-animation-duration: 5s;
                                        -vendor-animation-delay: 4s;
                                        -vendor-animation-iteration-count: infinite;
                                    }

                                    .blockquote_content::after {
                                        content: '"';
                                        font-size: 80px;
                                        position: absolute;
                                        font-family: 'Roboto';
                                        font-style: italic;
                                        line-height: 30px;
                                        bottom: -20px;
                                    }

                                    .block_quote::after {
                                        content: '' !important;
                                    }
                                </style>
                            </div>
                            <div class="hidden-md-up text-left  pl-1" style="padding-top: 50px">
                                <a href="#contactForm">
                                    <img src="http://bottamnhanhung.vn/images/btn_tuvan.gif" class="w-50">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses -->
    <section id="courses" class="padding parallax" style="background: #4587d9">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading heading_space wow fadeInDown" style="font-family:'Simplesnailsver'; font-size: 1.5em;">Bạn có biết hơn
                        <span style="text-transform: uppercase; font-weight: bold;color: pink;">90%</span> trẻ em ở Việt Nam chưa được chăm sóc da đúng cách?.
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
                                    <h3 class="bottom15" style="text-align: center;">
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

    <!--Fun Facts-->
    <section id="facts" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeInDown">
                    <h2 class="heading">Education Theme<span class="divider-center"></span></h2>
                    <p class="heading_space margin10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="row number-counters">
                <div class="col-md-2 col-sm-4">
                    <div class="counters-item">
                        <i class="icon-checkmark3"></i>
                        <strong data-to="1235">0</strong>
                        <!-- Set Your Number here. i,e. data-to="56" -->
                        <p>Project Completed</p>
                    </div>
                    <div class="counters-item last">
                        <i class="icon-trophy"></i>
                        <strong data-to="78">0</strong>
                        <p>Awards Won</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-4">
                    <div class="fact-image">
                        <img src="{{asset_website('images/fun-facts.png')}}" alt=" some facts" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="counters-item">
                        <i class=" icon-icons20"></i>
                        <strong data-to="186">0</strong>
                        <p>Hours of Work / Month</p>
                    </div>
                    <div class="counters-item last">
                        <i class="icon-happy"></i>
                        <strong data-to="89">0</strong>
                        <p>Satisfied Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Customers Review-->
    <section id="reviews" class="padding bg_light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeInDown">
                    <h2 class="heading heading_space">What People say <span class="divider-center"></span></h2>
                    <div id="review_slider" class="owl-carousel text-center">
                        <div class="item">
                            <h4>John Smith</h4>
                            <p>Ditector Shangha</p>
                            <img src="{{asset_website('images/customer1.png')}}" class="client_pic border_radius" alt="costomer">
                            <p>I've been happy with the services provided by Edua LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final Edua phase.</p>
                        </div>
                        <div class="item">
                            <h4>John Smith</h4>
                            <p>Ditector Shangha</p>
                            <img src="{{asset_website('images/customer1.png')}}" class="client_pic border_radius" alt="costomer">
                            <p>I've been happy with the services provided by Edua LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final Edua phase.</p>
                        </div>
                        <div class="item">
                            <h4>John Smith</h4>
                            <p>Ditector Shangha</p>
                            <img src="{{asset_website('images/customer1.png')}}" class="client_pic border_radius" alt="costomer">
                            <p>I've been happy with the services provided by Edua LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final Edua phase.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--Pricings-->
    {{--<section class="padding" id="pricing">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 text-center wow fadeInDown">--}}
    {{--<h2 class="heading">Pricing Tables <span class="divider-center"></span></h2>--}}
    {{--<p class="heading_space margin10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="pricing">--}}
    {{--<div class="pricing_item wow fadeInUp" data-wow-delay="300ms">--}}
    {{--<h3>Basic</h3>--}}
    {{--<div class="pricing_price"><span class="pricing_currency">$</span>9.90</div>--}}
    {{--<p class="pricing_sentence">Perfect for single freelancers who work by themselves</p>--}}
    {{--<ul class="pricing_list">--}}
    {{--<li class="pricing_feature">Support forum</li>--}}
    {{--<li class="pricing_feature">Free hosting</li>--}}
    {{--<li class="pricing_feature">40MB of storage space</li>--}}
    {{--<li>Social media integration</li>--}}
    {{--<li>1GB of storage space</li>--}}
    {{--</ul>--}}
    {{--<a class="btn_common text-center" href="#.">Choose plan</a>--}}
    {{--</div>--}}
    {{--<div class="pricing_item active wow fadeInUp" data-wow-delay="400ms">--}}
    {{--<h3>Popular</h3>--}}
    {{--<div class="pricing_price"><span class="pricing_currency">$</span>29,90</div>--}}
    {{--<p class="pricing_sentence">Suitable for small businesses with up to 5 employees</p>--}}
    {{--<ul class="pricing_list">--}}
    {{--<li class="pricing_feature">Unlimited calls</li>--}}
    {{--<li class="pricing_feature">Free hosting</li>--}}
    {{--<li class="pricing_feature">10 hours of support</li>--}}
    {{--<li class="pricing_feature">Social media integration</li>--}}
    {{--<li class="pricing_feature">1GB of storage space</li>--}}
    {{--</ul>--}}
    {{--<a class="btn_common text-center" href="#.">Choose plan</a>--}}
    {{--</div>--}}
    {{--<div class="pricing_item dark_gray wow fadeInUp" data-wow-delay="500ms">--}}
    {{--<h3>Premier</h3>--}}
    {{--<div class="pricing_price"><span class="pricing_currency">$</span>59,90</div>--}}
    {{--<p class="pricing_sentence">Great for large businesses with more than 5 employees</p>--}}
    {{--<ul class="pricing_list">--}}
    {{--<li class="pricing_feature">Unlimited calls</li>--}}
    {{--<li class="pricing_feature">Free hosting</li>--}}
    {{--<li class="pricing_feature">Unlimited hours of support</li>--}}
    {{--<li class="pricing_feature">Social media integration</li>--}}
    {{--<li class="pricing_feature">Unlimited storage space</li>--}}
    {{--</ul>--}}
    {{--<a class="btn_common text-center" href="#.">Choose plan</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <!--Pricings-->


    <!--Paralax -->
    {{--<section id="parallax" class="parallax">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 text-center wow bounceIn">--}}
    {{--<h2>We Believe that Education for Everyone Since</h2>--}}
    {{--<h1 class="margin10">1942</h1>--}}
    {{--<a href="#." class="border_radius btn_common white_border margin10">Gaet a Quote</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <!--Paralax -->

    <style>
        #quytrinh {
            background: no-repeat;
            background-size: 100% 100%;
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid #fff;
        }

        body .page-section {
            padding: 50px 0 0;
            background-size: cover;
            background: #f3f3f3 no-repeat center center;
            position: relative;
        }

        @media (min-width: 1200px) {
            #quytrinh h2 {
                padding-top: 10px;
            }

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
            #quytrinh .quytrinh_item {
                padding: 60px 0 130px;
            }

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

            .col-5 {
                flex: 0 0 41.66667%;
                max-width: 41.66667%;
            }
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item img {
                width: 300px;
                height: 300px;
            }
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item p {
                font-size: 25px;
                width: 90%;
                margin: 0px auto;
                padding-top: 10px;
            }
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item_mui_ten {
                padding: 60px 0 150px;
            }
        }

        .col-2 {
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item_mui_ten img {
                height: 300px;
            }

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
            #quytrinh .quytrinh_item {
                padding: 60px 0 130px;
            }

            .fadeInRight {
                -webkit-animation-name: fadeInRight;
                animation-name: fadeInRight;
            }
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item img {
                width: 300px;
                height: 300px;
            }
        }

        @media (min-width: 1200px) {
            #quytrinh .quytrinh_item p {
                font-size: 25px;
                width: 90%;
                margin: 0px auto;
                padding-top: 10px;
            }
        }
    </style>
    <section id="quytrinh" class="page-section">

        <div class="container">
            <h2 class="section-heading text-blue text-center text-uppercase clearfix  scrollpoint sp-zoomIn active animated zoomIn">Khi da bé khỏe</h2>
            <div class="row">
                <div class="col-5 col-md-5 quytrinh_item text-center scrollpoint sp-fadeInLeft active animated fadeInLeft">
                    <a href="http://bottamnhanhung.vn/bi-quyet-cham-soc-da-be-khoe-manh-moi-ngay">
                        <img src="http://bottamnhanhung.vn/images/b1.png">
                        <p style="font-weight: 500;">Khi da bé khỏe</p>
                    </a>

                </div>
                <div class="col-2 col-md-2 quytrinh_item_mui_ten text-center">
                    <img src="http://bottamnhanhung.vn/images/mui_ten.png" class="scrollpoint sp-zoomIn active animated zoomIn">
                </div>
                <div class="col-5 col-md-5 quytrinh_item text-center scrollpoint sp-fadeInRight active animated fadeInRight">
                    <a href="http://bottamnhanhung.vn/tai-sao-khi-da-be-khoe-co-the-dung-sua-tam-thong-thuong">
                        <img src="http://bottamnhanhung.vn/images/b2.png">
                        <p class="clearfix" style="font-weight: 500;">Có thể tắm cho bé bằng các loại sữa tắm thông thường</p>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- News-->
    <section id="news" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown">
                    <h2 class="heading heading_space">@lang('website.chia-se-cua-me')<span class="divider-left"></span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_wrapper">
                        <div id="news_slider" class="owl-carousel">
                            @forelse($shares as $share)
                                <div class="item">
                                    <div class="content_wrap">
                                        <div class="image">
                                            <img src="{{$share->getImagePath()}}" alt="Edua" class="img-responsive border_radius">
                                        </div>
                                        <div class="news_box border_radius" style="height: 70px;">
                                            <h4><a href="{{$share->getSlugAndId()}}">{{str_limit($share->title)}}</a>
                                            </h4>
                                            {{--<ul class="commment">--}}
                                            {{--<li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>--}}
                                            {{--<li><a href="#."><i class="icon-comment"></i> 02</a></li>--}}
                                            {{--</ul>--}}
                                            {{--<p>We offer the most complete house Services in the country...</p>--}}
                                            {{--<a href="blog_detail.html" class="readmore">Read More</a>--}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Contact Deatils -->
    <section id="contact" class="padding">
        <div class="container">
            <div class="row padding-bottom">
                <div class="col-md-8 wow fadeInRight" data-wow-delay="300ms">
                    <h2 class="heading heading_space" style="text-transform: uppercase">@lang('website.contact us')<span class="divider-left"></span></h2>
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
                        <li><a href="{{setting("_social_facebook") ?? '#'}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{setting("_social_twitter") ?? '#'}}" class="twitter"><i class="icon-twitter4"></i></a></li>
                        <li><a href="{{setting("_social_youtube") ?? '#'}}" class="dribble"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{setting("_social_whatsapp") ?? '#'}}" class="instagram"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="{{setting("_social_google_plus") ?? '#'}}" class="instagram"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 contact_address heading_space wow fadeInLeft" data-wow-delay="1000ms">
                    <h2 class="heading heading_space">Hoặc<span class="divider-left"></span></h2>
                    <p></p>
                    <div class="address">
                        <i class="icon icon-map-pin border_radius"></i>
                        <h4>@lang('admin/common.address')</h4>
                        <p>{{setting(\App\Models\Setting::KEY_WEBSITE_ADDRESS)}}</p>
                    </div>
                    <div class="address">
                        <i class="icon icon-mail border_radius"></i>
                        <h4>@lang('Email')</h4>
                        <p><a href="mailto:Edua@info.com">{{setting(\App\Models\Setting::KEY_ADMIN_EMAIL)}}</a></p>
                    </div>
                    <div class="address">
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