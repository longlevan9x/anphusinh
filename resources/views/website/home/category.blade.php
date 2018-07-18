@extends('website.index')
@section('content')
    @php
        /** @var \App\Models\Post $model */
        /** @var \Illuminate\Pagination\LengthAwarePaginator $models */
    @endphp
    @forelse($models as  $model)
        <article class="blog_item bottom5 wow fadeInLeft" data-wow-delay="300ms">
            <div class="row">
                <div class="col-md-4 col-sm-4 bottom15">
                    <div class="image"><img src="{{$model->getImagePath()}}" alt="blog" class="border_radius"></div>
                </div>
                <div class="col-md-8 col-sm-8 bottom15">
                    <h3>{{$model->title}}</h3>
                    {{--<ul class="comment margin10">--}}
                    {{--<li><a href="#.">May 10, 2016</a></li>--}}
                    {{--<li><a href="#."><i class="icon-comment"></i> 5</a></li>--}}
                    {{--</ul>--}}
                    <p class="margin10">{{$model->overview}}</p>
                    <a class=" btn_common btn_border margin10 border_radius" href="{{url($model->getSlugAndId())}}">Read More</a>
                </div>
            </div>
        </article>
    @empty
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">@lang('admin/common.not found')</h3>
            </div>
        </div>
    @endforelse
    @includeWhen(isset($models) && !empty($models) && !empty($models->items()), 'website.partials.pagination', ['models' => $models])
@endsection