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
    <div class="content-tab">
        <div class="col-md-7 poster hidden-xs">
            {{$setting->value ?? ''}}
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
                    {{ Form::hidden('ipv4', $value = null, ['id' => 'ipv4']) }}
                    {{ Form::hidden('city', $value = null, ['id' => 'city']) }}
                    {{ Form::hidden('product_id', $value = $model->id, ['id' => 'product_id']) }}
                    <i style="color:red;">* : Thông tin bắt buộc</i>
                    {{ Form::text('name', $value = null, ['placeholder' => "Họ và tên: *", 'required' => true, 'class' => 'form-control']) }}
                    {{ Form::number('phone', $value = null, ['placeholder' => "Điện thoại: *", 'required' => true, 'class' => 'form-control']) }}
                    <div class="col-12" style="text-align: center;">
                        <img src="{{$model->getImagePath()}}" class="w-50">
                        <strong style="text-align:center;display:block;color:red;font-size:18px">{{number_format($model->price)}} đ</strong>
                        {{ Form::number('quantity', $value = null, ['placeholder' => "Số hộp: *", 'required' => true, 'class' => 'form-control']) }}
                    </div>

                    <div class="clear"></div>
                    @include('admin.layouts.widget.button.button', ['class' => 'btn-block', 'text' => 'Đặt hàng ngay', 'id' => 'btnOrder'])
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@push('scriptString')
    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
                }
            });

            $("#btnOrder").click(function () {

            });
            // $.get("http://ipinfo.io", function (response) {
            //     console.log(response);
            //     $("#ip").html("IP: " + response.ip);
            //     $("#address").html("Location: " + response.city + ", " + response.region);
            //     $("#details").html(JSON.stringify(response, null, 4));
            // }, "jsonp");

            $.ajax({
                url:           "https://geoip-db.com/jsonp",
                jsonpCallback: "callback",
                dataType:      "jsonp",
                success:       function (location) {
                    // console.log(location);
                    $("#city").val(location.city);
                    $("#ipv4").val(location.IPv4);
                }
            });
        });
    </script>
@endpush