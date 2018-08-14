@extends('website.index')
@section('content')
    @php
        /** @var \App\Models\Post $model */
        /** @var \App\Models\Post $post */
        /** @var \App\Models\Post|\App\Models\PostMeta $advertise_post */
        /** @var \App\Models\Product $product */
    @endphp
    {{--<div class="detail_course">--}}
    {{--<div class="clearfix">--}}
    {{--<ul class="comment pull-left">--}}
    {{--<li><a href="#." class="facebook"><i class="icon-map-pin"></i> July 19, 2017 3:15 pm</a></li>--}}
    {{--<li><a href="#." class="facebook"><i>End:</i> July 19, 2017 3:15 pm</a></li>--}}
    {{--<li><a href="#." class="facebook"><i class="icon-icons20"></i> Paris, Rue Femile 82</a></li>--}}
    {{--</ul>--}}
    {{--<a href="#." class="btn_common blue border_radius pull-right"> Join!</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    <h3 class="top30 bottom20" style="font-size: 2em;">{{$model->title}}</h3>
    <p class="bottom25" style="font-weight: 700;font-size: 1.1em;">{!! $model->overview !!}</p>
    <img src="{{$model->getImagePath()}}" alt="Teachers" class=" border_radius img-responsive bottom15">

    <div class="bottom25">{!! $model->content !!}</div>

    <div class="clearfix"></div>

    <style>
        body .box_goto_drugstore .box_main {
            /*border: 1px solid #7a232e;*/
            -webkit-box-shadow: 0 0 0 0 rgba(0, 0 ,0 , 1);
            -moz-box-shadow: 0 0 0 0 rgba(0, 0 ,0 , 1);
            -o-box-shadow: 0 0 0 0 rgba(0, 0 ,0 , 1);
            box-shadow: 0 0 0 0 rgba(0, 0 ,0 , 1);
        }

        .bg-light {
            background-color: #bde6ff;
        }

        .text-red {
            color: #7a232e;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-orange {
            color: #f15a29;
        }

        body .box_goto_drugstore .box_main .box_inner .button {
            background: #f15a29;
            padding: 5px 8px;
            color: white;
            font-size: 0.8rem;
            margin: 0px auto;
            display: table;
            border-radius: 5px;
        }

        @media (min-width: 768px) {
            .px-md-5 {
                padding-right: 3rem !important;
                padding-left: 3rem !important;
            }
        }

    </style>
    <div class="box_goto_drugstore bottom20 top20">
        <div class="row">
            <div class="col-sm-5 px-md-5">
                <div class="box_main bg-light" style="padding: 25px;">
                    <div class="box_inner bg-light">
                        <center>Mua <span class="text-red text-uppercase text-bold">Bột tắm</span> <br> ở
                            <span class="text-orange text-uppercase text-bold">Hà nội	</span></center>
                        <a href="{{url('ha-noi')}}" class="button text-bold text-uppercase" style="margin-top: 10px">Bấm để xem</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 text-center mt-5 top30">
			<span class="text-uppercase  text-bold">
				Hoặc
			</span>
            </div>
            <div class="col-sm-5 px-md-5">
                <div class="box_main bg-light" style="padding: 25px;">
                    <div class="box_inner bg-light">
                        <center>Mua <span class="text-red text-uppercase text-bold">Bột tắm</span> nơi <br>
                            <span class="text-orange text-uppercase text-bold"> Bạn gần nhất	</span></center>
                        <a href="{{url('he-thong-nha-thuoc')}}" class="button text-bold text-uppercase" style="margin-top: 10px">Bấm để xem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>


    <div id="box_lydo">
        <div class="row">
            <div class="col-md-12">
                <div class="header_lydo">{{$advertise_post->title}}</div>
            </div>
            <div class="col-sm-6 img">
                <img src="{{$product->getImagePath()}}" class="align-middle">
                <center>
                    <p style="padding-top: 15px;font-size: 16px;font-weight: bold;">{{number_format($product->price)}} đ / hộp</p>
                </center>
            </div>
            <div class="col-sm-6">

                {!! $advertise_post->_banner_content  !!}

                <center>
                    <p><strong>Chương trình cam kết</strong></p>
                    <p>
                        <a href="{{$advertise_post->getSlugAndId()}}" class="btn btn-primary">Xem tại đây</a>
                    </p>
                    <!-- <p><i>* Mọi thông tin chi tiết và thắc mắc về chương trình, vui lòng liên hệ: <br> 1800 6960 (miễn cước)	.</i></p> -->
                </center>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <!-- Relate Post -->
    <div class="posts_concern mb-3">Bài viết liên quan</div>
    <section id="events" class="padding-bottom">
        <div class="row">
            @forelse($relate_posts as $post)
                <div class="col-sm-6 col-md-4">
                    <div class="events top30 wow fadeIn" data-wow-delay="300ms">
                        <div class="image">
                            <img title="{{str_limit($post->title, 100)}}" src="{{$post->getImagePath()}}" alt="{{str_limit($post->title, 100)}}" class="">
                        </div>
                        <h4 class="top20 item">
                            <a href="{{$post->getSlugAndId()}}" title="{{str_limit($post->title, 100)}}">{{str_limit($post->title, 45)}}</a>
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
    <!-- Relate Post -->
@endsection