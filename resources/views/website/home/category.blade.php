@extends('website.index')
@section('content')
    @php
        /** @var \App\Models\Post $model */
        /** @var \Illuminate\Pagination\LengthAwarePaginator $models */
    @endphp
    <style type="text/css">
        .post-item {
            cursor: pointer;
        }
    </style>
    @forelse($models as  $model)
        <article class="blog_item bottom5 wow fadeInLeft" data-wow-delay="300ms">
            <div class="row">
                <div class="col-md-4 col-sm-4 bottom15 post-item post-item-image">
                    <div class="image"><img src="{{$model->getImagePath()}}" alt="blog" class="border_radius"></div>
                </div>
                <div class="col-md-8 col-sm-8 bottom15">
                    <h3 class="post-item post-item-title" title="{{$model->title}}">{{str_limit($model->title, 40)}}</h3>
                    {{--<ul class="comment margin10">--}}
                    {{--<li><a href="#.">May 10, 2016</a></li>--}}
                    {{--<li><a href="#."><i class="icon-comment"></i> 5</a></li>--}}
                    {{--</ul>--}}
                    <p class="margin10">{{str_limit($model->overview, 200)}}</p>
                    <a class=" btn_common btn_border margin10 border_radius post-item-readmore" href="{{url($model->getSlugAndId())}}">Read More</a>
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
    @push('scriptString')
        <script type="text/javascript">
            $('.post-title-image, .post-item-title').click(function () {
                window.location.href = $(this).parents('.blog_item').find('.post-item-readmore').attr('href');
            });
        </script>
    @endpush
    @includeWhen(isset($models) && !empty($models) && !empty($models->items()), 'website.partials.pagination', ['models' => $models])
@endsection