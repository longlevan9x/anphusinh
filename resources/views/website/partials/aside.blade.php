@php
    /** @var \App\Models\Post $item */
@endphp
<style>
    .widget .sb_body {
        /*border: 1px solid #2155A4;*/
    }

    .widget .video-list {
        /*background-color: #ebebeb;*/
        padding: 5px 0px;
    }

    .widget .video-list ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .widget .video-list ul li {
        border-bottom: 1px solid #bababa;
    }

    .widget .video-list ul li::before {
        font-size: 20px;
        line-height: 24px;
        content: "‣";
        color: #b0b0b0;
    }

    .widget .video-list ul li a {
        line-height: 24px;
        padding-left: 5px;
        color: #1464a1;
        font-style: italic;
    }

    aside h3.bottom20 {
        text-align: center;
        background: #4587d9;
        padding: 8px 0;
        border-radius: 10px 10px 0 0;
        text-transform: uppercase;
        color: #fff;
    }

    .w-100 {
        width: 100% !important;
    }

    .p-2 {
        padding: 0.5rem 0.5rem !important;
    }
</style>
<aside class="col-sm-4 wow fadeIn" data-wow-delay="200ms">
    <div class="widget heading_space">
        <h3 class="bottom20">@lang('admin/menu.share experience')</h3>
        @forelse($share_experience as $item)
            <div class="media">
                <a class="media-left" style="width: 35%;" href="{{$item->getSlugAndId()}}"><img style="width: 100%;" src="{{$item->getImagePath()}}" alt="post"></a>
                <div class="media-body">
                    <h5 class="bottom5">{{$item->title}}</h5>
                    <a href="#." class="btn-primary btn btn-sm border_radius bottom5">@lang('website.read more')</a>
                </div>
            </div>
        @empty
        @endforelse
    </div>

    @if(!empty($advice_expert))
        @php
            $item = $advice_expert->get(0);
            $urlVideo = $item->overview;
            if (\Illuminate\Support\Str::startsWith($urlVideo, 'https://www.youtube.com/')) {
                $urlVideo = substr($urlVideo, strpos($urlVideo, '='));
                $listUrl = explode("=", $urlVideo);
                if (count($listUrl) > 1) {
                    $urlVideo = $listUrl[1];
                    $urlVideo1 = substr($urlVideo, strpos($urlVideo, '&'));
                    $urlVideo = str_replace($urlVideo1, '', $urlVideo);
                }
            }
        @endphp
        <div class="widget heading_space">
            <h3 class="bottom20">@lang('admin/menu.expert advice')</h3>

            <div class="sb_body">
                <div class="embed-responsive embed-responsive-16by9" style="margin-top: -20px;">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$urlVideo}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="video-list">
                    <ul>
                        @forelse($advice_expert as $item)
                            <li>
                                <a href="{{$item->getSlugAndId()}}">{{$item->title}}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    @endif
    @if(request()->getPathInfo() == '/hoi-dap')
        <div class="widget heading_space" style="border: 1px solid #4587d9;border-radius: 10px 10px 0 0;">
            <h3 class="bottom20">@lang('website.expert consultants')</h3>
            <div class="sb_body">
                <img src="http://bottamnhanhung.vn/assets/uploads/thumbs/anh-bac-si-tu-van_9835306.png" class="w-100">
                {{Form::open([
                    'url' => '',
                    'style' => '    padding: 15px;text-align:center'
                ])}}
                <div class="form-group">
                    {{Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => __('admin/common.name')])}}
                </div>
                <div class="form-group">
                    {{Form::text('phone', $value = null, ['class' => 'form-control', 'placeholder' => __('admin/common.phone')])}}
                </div>
                <div class="form-group">
                    {{Form::textarea('question', $value = null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Câu hỏi')])}}
                </div>
                <div class="form-group">
                    {{Form::textarea('content', $value = null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Nội dung câu hỏi')])}}
                </div>

                <div class="clearfix"></div>
                <div class="col-md-6">
                    @include('admin.layouts.widget.button.button', ['name' => 'ask_submit', 'btn_size' => 'md', 'btn_type' => "primary", 'text' => __('website.ask_submit'), 'options' => ['class' => "btn-block"]])
                </div>
                <div class="col-md-6">
                    @include('admin.layouts.widget.button.button', ['btn_type' => "default", 'btn_size' => 'md', 'text' => __('admin.cancelButton'), 'type' => "reset", 'options' => ['class' => "btn-block"]])
                </div>

                <div class="clearfix"></div>

                {{Form::close()}}
            </div>
        </div>
    @endif
    <div class="widget">
        <div class="fb-page" data-href="{{setting('_social_facebook')}}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="{{setting('_social_facebook')}}" class="fb-xfbml-parse-ignore">
                <a href="{{setting('_social_facebook')}}">Chuyện của Em</a></blockquote>
        </div>
    </div>
</aside>