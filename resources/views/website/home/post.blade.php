@extends('website.index')
@section('content')
    @php
        /** @var \App\Models\Post $model */
    @endphp
    {{--<div class="detail_course">--}}
    {{--<div class="clearfix">--}}
    {{--<ul class="comment pull-left">--}}
    {{--<li><a href="#." class="facebook"><i class="icon-map-pin"></i> July 19, 2017 3:15 pm</a></li>--}}
    {{--<li><a href="#." class="facebook"><i>End:</i> July 19, 2017 3:15 pm</a></li>--}}
    {{--<li><a href="#." class="facebook"><i class="icon-icons20"></i> Paris, Rue Femile 82</a></li>--}}
    {{--</ul>--}}
    {{--<a href="#." class="btn_common blue border_radius pull-right"> Join!</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    <h3 class="top30 bottom20" style="font-size: 2em;">{{$model->title}}</h3>
    <p class="bottom25" style="font-weight: 700;font-size: 1.1em;">{{$model->overview}}</p>
    <img src="{{$model->getImagePath()}}" alt="Teachers" class=" border_radius img-responsive bottom15">

    <p class="bottom25">{{$model->content}}</p>
@endsection