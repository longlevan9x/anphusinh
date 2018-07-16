@extends('website.index')
@section('content')
    @php
        $urlVideo = $model->image;
        if (\Illuminate\Support\Str::startsWith($urlVideo, 'https://www.youtube.com/')) {
            $urlVideo = substr($urlVideo, strpos($urlVideo, '='));
            $listUrl = explode("=", $urlVideo);
            if (count($listUrl) > 1) {
                $urlVideo = $listUrl[1];
            }
        }
    @endphp
    <h3 class="detail_title" style="color: #4587d9;">{{$model->title}}</h3>

    <div class="embed-responsive embed-responsive-16by9" style="margin-top: 10px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$urlVideo}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
@endsection