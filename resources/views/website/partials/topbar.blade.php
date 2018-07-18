<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!--Loader-->
{{--<div class="loader">--}}
    {{--<div class="bouncybox">--}}
        {{--<div class="bouncy"></div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="topbar" style="position:  fixed;z-index: 1000;width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="pull-left ">--}}
                {{--<span class="info"><a href="#."> Have any question?</a></span>--}}
                {{--<span class="info"><i class="icon-phone2"></i>(654) 332-112-222</span>--}}
                {{--<span class="info"><i class="icon-mail"></i>support@edua.com</span>--}}
                {{--</div>--}}
                {{--<div class="pull-left ">--}}
                {{--<span class="info"><a href="#."> Have any question?</a></span>--}}
                {{--<span class="info"><i class="icon-phone2"></i>(654) 332-112-222</span>--}}
                {{--<span class="info"><i class="icon-mail"></i>support@edua.com</span>--}}
                {{--</div>--}}
                <div class="pull-left">
                    {{Form::open(['url' => url('dang-ky'),'id' => 'form-subscribe', 'class' => 'form-inline', 'style' => "padding-top: 5px;"])}}

                    <label class="control-label" style="text-transform: uppercase" for="">@lang('website/common.free registration registration')</label>:&nbsp;
                    {{Form::text('name', $value = null, ['class' => "form-control input-sm  form-group-sm", 'style' => 'width: 200px;', 'placeholder' => __('website/common.fullname')])}}
                    {{Form::text('phone', $value = null, ['class' => "form-control input-sm  form-group-sm", 'style' => 'width: 200px;', 'placeholder' => __('website/common.phone_number')])}}
                    <input type="hidden" id="message-subscribe">
                    @include('admin.layouts.widget.button.button', ['text' => __('admin.submitButton'), 'btn_type' => 'default', 'id' => 'btnSubscribe'])

                    {{Form::close()}}
                </div>
                <ul class="social_top pull-right">
                    <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-twitter4"></i></a></li>
                    <li><a href="#."><i class="icon-google"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>