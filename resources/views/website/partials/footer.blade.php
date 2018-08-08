<!--FOOTER-->
<footer class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <div class="col-md-12">
                    <h3 class="heading bottom25">@lang('website.about-us')<span class="divider-left"></span></h3>
                    <a style="width: 105px;float: left;margin-right: 25px;" href="{{url('/')}}" class="footer_logo bottom25"><img style="width: 100%;" src="{{\App\Commons\Facade\CFile::getImageUrl('settings', setting(KEY_LOGO))}}" alt="{{setting(KEY_WEBSITE_DESCRIPTION)}}"></a>
                    <p>{{setting(KEY_WEBSITE_NAME)}}</p>
                    <p>{{setting(KEY_WEBSITE_DESCRIPTION)}}</p>
                </div>
                <div class="col-md-12">

                    <ul class="social_icon">
                        <li><a href="{{setting("_social_facebook") ?? '#'}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{setting("_social_twitter") ?? '#'}}" class="twitter"><i class="icon-twitter4"></i></a></li>
                        <li><a href="{{setting("_social_whatsapp") ?? '#'}}" class="dribble"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="{{setting("_social_youtube") ?? '#'}}" class="instagram"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{setting("_social_google_plus") ?? '#'}}" class="instagram"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">@lang('website.quick-link')<span class="divider-left"></span></h3>
                <ul class="links">
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.home page')</a></li>
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.product')</a></li>
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.chia-se')</a></li>
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.expert-share')</a></li>
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.news')</a></li>
                    <li><a href="#."><i class="icon-chevron-small-right"></i>@lang('website.order')</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 footer_panel bottom25">
                <h3 class="heading bottom25">@lang('admin/common.address')<span class="divider-left"></span></h3>
                <p class=" address"><i class="icon-map-pin"></i>{{setting(\App\Models\Setting::KEY_WEBSITE_ADDRESS)}}</p>
                <p class=" address"><i class="icon-phone"></i>{{setting(\App\Models\Setting::KEY_WEBSITE_PHONE)}}</p>
                <p class=" address"><i class="icon-mail"></i><a href="mailto:{{setting(\App\Models\Setting::KEY_ADMIN_EMAIL)}}">{{setting(\App\Models\Setting::KEY_ADMIN_EMAIL)}}</a></p>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {{setting(\App\Models\Setting::KEY_WEBSITE_COPYRIGHT)}}
            </div>
        </div>
    </div>
</div>