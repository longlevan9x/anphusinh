@push('cssString')
    <style type="text/css">
        .category {
            padding-top: 50px;
            padding-bottom: 20px;
        }

        .category .slider_wrapper .owl-item {
            height: 340px !important;
        }

        .category .slider_wrapper .item {
            position: relative;
            height: inherit;
        }

        .category .slider_wrapper .item h3 {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .category .slider_wrapper .item .image {
            max-height: 270px;
        }
    </style>
@endpush
<!-- Courses -->
<section id="courses" class="parallax category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading heading_space wow fadeInDown" style="font-family:'Simplesnailsver'; font-size: 1.7em;color: #4587d9;">Vì sao phụ nữ mang thai cần phải đi khám sàng lọc trước sinh?
                    <span class="divider-left"></span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="slider_wrapper">
                    <div id="course_slider" class="owl-carousel">
                        @forelse($categories as $category)
                            <div class="item">
                                <div class="image bottom20">
                                    <img src="{{$category->getImagePath()}}" alt="Courses" class="img-responsive border_radius">
                                </div>
                                <h3 class="bottom15" style="text-align: center;color: #4587d9;">
                                    <a href="{{url($category->slug)}}">{{$category->name}}</a></h3>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Courses -->