@extends('website.index')
@section('content')
    <style>
        .header-tab {
            background-color: #4587d9;
            border-radius: 6px 6px 0 0;
        }

        .header-tab h2 {
            padding-top: 10px;
        }

        .header-tab h2 a {
            display: inline-block;
            padding: 13px 15px 10px;
            margin: 0 2px;
            -webkit-border-radius: 6px 6px 0 0;
            border-radius: 6px 6px 0 0;
            background-color: #306fbe;
            color: #fff;
            font-size: 18px;
            line-height: 1;
            font-family: 'Myriad Pro Semibold';
            text-transform: uppercase;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .header-tab h2 a.actived {
            color: #2155A4;
            background-color: #fff;
        }

        .poster {
            text-align: center;
            margin-top: 80px;
        }

        .content-tab img {
            max-width: 100%;
            height: auto;
        }

        .form-order {
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #FFF;
            border: 1px solid #005F80;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            width: 97%;
            margin-top: 20px;
            display: block;
            overflow: hidden;
        }

        .form-order .input-order input {
            height: 35px;
        }

        .form-order .input-order input, .form-order .input-order textarea {
            margin-bottom: 10px;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.15);
            padding: .5rem .75rem;
            border-radius: .25rem;
        }
    </style>
    <div class="col-md-12">
        <div class="header-tab" style="text-align: center;">
            <h2 class="clearfix">
                <a style="width: 45%" href="{{route('he-thong-nha-thuoc')}}">Hệ thống phân phối</a>
                <a style="width: 45%" href="#" class="actived">Đặt hàng online</a>
            </h2>
        </div>
    </div>
    <div class="content-tab row">
        <div class="col-md-7 poster hidden-xs">
            <center><strong>LƯU Ý KHI MUA HÀNG ONLINE</strong></center>
            <ul style="text-align: left;">
                <li>- Miễn phí giao hàng từ 5 hộp trở lên</li>
                <li>- Nhận hàng và thanh toán tiền tại địa chỉ giao hàng</li>
                <li>- Giao hàng từ thứ 2 đến thứ 6 hàng tuần</li>
            </ul>
            <img src="http://bottamnhanhung.vn/images/order.jpg" class="w-75">
        </div>
        <div class="col-md-5">
            <div class="form-order">

                <div class="col-12">
                    <div class="col-xs-7">
                        <p></p>
                    </div>
                    <div class="col-xs-5">
                    </div>
                </div>
                {{ Form::open(['url' => route('dat-hang')]) }}
                    <div class="col-xs-12 input-order">
                        <input name="ip" type="hidden" value="116.96.243.213">
                        <input name="url" type="hidden" value="http://bottamnhanhung.vn/dat-hang-thanh-cong">
                        <i style="color:red;">* : Thông tin bắt buộc</i>
                        <input class="form-control" placeholder="Họ và tên: *" name="name" type="text" value="">
                        <input class="form-control" placeholder="Điện thoại: *" name="phone" type="text" value="">

                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <img src="{{$model->getImagePath()}}" class="w-50">
                                <strong style="text-align:center;display:block;color:red;font-size:18px">{{number_format($model->price)}} đ</strong>
                                <input class="form-control" placeholder="Số hộp" name="count" type="text" value="">
                            </div>
                        </div>

                        <div class="clear"></div>
                        <button class="btn btn-block btn-primary">Đặt hàng ngay</button>
                    </div>
                </form>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection