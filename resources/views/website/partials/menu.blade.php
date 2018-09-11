<style type="text/css">
    @media screen and (min-width: 1024px) {
        nav.navbar.bootsnav.navbar-fixed .navbar-brand img {
            width: 115px;
            height: 100px;
        }
    }

    @media only screen and (max-width: 1100px) {
        nav.navbar.bootsnav ul.nav > li > a {
            font-size: 11px;
        }

        .hidden-sm-down img {
            width: 40px !important;
        }

        #popup_bottom_left {
            width: 150px !important;
        }

        .topbar ul.social_top li a {
            height: 35px !important;
        }

        #form-subscribe input {
            height: 24px !important;
        }

        .btn-group-sm > .btn, .btn-sm {
            padding: 2px 10px !important;
        }

        .icon_box h4 {
            font-size: 1em !important;
        }

        .icon_box p {
            font-size: 0.8em !important;
        }
    }

    .navbar .subscribe {
        display: none;
        margin-top: 20px;
    }

    section#about {
        padding-top: 150px;
        padding-bottom: 40px;
    }

    @media screen and (max-width: 762px) {
        .navbar .subscribe {
            display: block;
        }

        nav.navbar.bootsnav {
            top: 0 !important;
        }

        .rev_slider_wrapper {
            top: 6.8% !important;
        }

        section#about {
            padding-top: 70px;
        }

        body .page-section#section-chuyen-gia .border-cloud {
            background-size: 63% !important;
        }

        .doctor-comment.row {
            background-size: 50% !important;
        }
    }
</style>
<!--Header-->
<header>
    <nav class="navbar navbar-default navbar-fixed white bootsnav" style="top: 35px;">
        <div class="container">
            {{--<div class="search_btn btn_common"><i class="icon-icons185"></i></div>--}}
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{\App\Commons\Facade\CFile::getImageUrl('settings', setting(KEY_LOGO))}}" alt="logo" class="logo logo-display">
                    <img src="{{\App\Commons\Facade\CFile::getImageUrl('settings', setting(KEY_LOGO))}}" class="logo logo-scrolled" alt="">
                </a>

                <div class="subscribe">
                    <a href="#subscribe-form-modal" data-toggle="modal" data-target="#subscribe-form-modal">
                        <img src="{{asset_uploads('www/subscribe.gif')}}" alt="subscribe" style="width: 115px;">
                    </a>
                    {{--<button class="btn btn-sm btn-primary">@lang('website.dang ky nhan tin')</button>--}}
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
                    @foreach($menus as $menu)
                        <li class="{{isset($menu['children']) && !empty($menu['children']) ? 'dropdown' : ''}}">
                            @if(!isset($menu['children']) || empty($menu['children']))
                                <a href="{{$menu['url']}}">{{$menu['text']}}</a>
                            @else
                                <a href="{{$menu['url']}}" class="dropdown-toggle" data-toggle="dropdown">{{$menu['text']}}</a>
                                @if(isset($menu['children']) && !empty($menu['children']))
                                    <ul class="dropdown-menu">
                                        @foreach($menu['children'] as $child)
                                            <li><a href="{{$child['url']}}">{{$child['text']}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>

<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{--<!--Search-->--}}
{{--<div id="search">--}}
{{--<button type="button" class="close">×</button>--}}
{{--<form>--}}
{{--<input type="search" value="" placeholder="Search here...." required />--}}
{{--<button type="submit" class="btn btn_common blue">Search</button>--}}
{{--</form>--}}
{{--</div>--}}


<!-- /.modal -->
<div class="modal modal-contact" id="subscribe-form-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><label class="control-label" style="text-transform: uppercase" for="">@lang('website/common.free registration registration')</label>:&nbsp;</h4>
            </div>
            <div class="modal-body">
                {{Form::open(['url' => url('dang-ky'),'id' => 'form-subscribe-modal', 'class' => 'form-inline', 'style' => "padding-top: 5px;"])}}
                {{Form::text('name', $value = null, ['class' => "form-control   form-group", 'placeholder' => __('website/common.fullname')])}}
                {{Form::text('phone', $value = null, ['class' => "form-control  form-group", 'placeholder' => __('website/common.phone_number')])}}
                <input type="hidden" id="message-subscribe">
                {{Form::close()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSubscribeModal">@lang('admin.submitButton')</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.cancelButton')</button>
            </div>
        </div>
    </div>
</div>