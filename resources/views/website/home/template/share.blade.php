<!-- News-->
<section id="news" class="padding-top-50 padding-bottom-50 bg_light">
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
