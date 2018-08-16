@extends('website.index')
@section('content')
    @php
        /** @var \App\Models\Post|\App\Models\PostMeta $advertise_post */
        /** @var \App\Models\Product $product */
    @endphp
    <h3 class="top30 bottom20" style="font-size: 2em;">@lang('Xác nhận công bống sản phẩm')</h3>
    <img src="{{asset_uploads('www/xac-nhan-cong-bo.jpg')}}" alt="Teachers" class=" border_radius img-responsive bottom15">

    <div class="clearfix"></div>

    @push('cssString')
        <style>
            body .box_goto_drugstore .box_main {
                /*border: 1px solid #7a232e;*/
                -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
                -moz-box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
                -o-box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
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
    @endpush
    <div class="box_goto_drugstore bottom20 top20">
        <div class="row">
            <div class="col-sm-5 px-md-5">
                <div class="box_main bg-light" style="padding: 25px;">
                    <div class="box_inner bg-light">
                        <center>Mua <span class="text-red text-uppercase text-bold">An phụ sinh</span> <br> ở
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
                        <center>Mua <span class="text-red text-uppercase text-bold">An phụ sinh</span> nơi <br>
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

@endsection