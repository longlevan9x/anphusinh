@extends('website.index')
@section('content')
    @php
        $urlVideo = $model->overview;
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
    <h3 class="detail_title" style="color: #4587d9;">{{$model->title}}</h3>

    <div class="embed-responsive embed-responsive-16by9" style="margin-top: 10px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$urlVideo}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

    <style>
        .list_video_title h2 {
            font-size: 20px;
            border-bottom: 2px solid #2155A4;
            line-height: 1.5;
        }
    </style>
    <div class="list_video_title top20">
        <h2><a href="#" class="text-red">List Video<span class="icon-carousel_arrow_right"></span></a></h2>
    </div>

    <section id="events" class="padding-bottom">
        <div class="row">
            @forelse($relate_posts as $post)
                <div class="col-sm-6 col-md-4">
                    <div class="events top30 wow fadeIn" data-wow-delay="300ms">
                        <div class="image">
                            <img title="{{str_limit($post->title, 100)}}" src="{{$post->getImagePath()}}" alt="{{str_limit($post->title, 100)}}" class="">
                        </div>
                        <h4 class="top20">
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