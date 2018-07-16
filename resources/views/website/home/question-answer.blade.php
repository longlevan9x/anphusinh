@extends('website.index')
@section('content')
    <style>
        #content {
            text-align: justify;
        }

        #content h1 {
            font-size: 21px;
            color: #2155A4;
        }

        .new-ques {
            font-size: 21px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #2155A4;
            padding-bottom: 5px;
            margin-bottom: 20px;
            color: #2155A4;
        }

        .fitwp_question {
            border: 1px solid #E8E8E8;
            clear: both;
            margin: 0 0 20px;
            padding: 10px;
            text-align: justify;
            background-color: #fff;
        }

        .fitwp_question a {
            color: #2155A4;
            font-weight: bold;
            font-size: 15px;
        }

        #content img {
            max-width: 100%;
            height: auto;
        }

        .fitwp_question .question_name {
            line-height: 1.2;
            text-align: center;
            font-weight: bold;
            color: #e8497f;
        }

        .mt-1 {
            margin-top: 0.25rem !important;
        }

        .fitwp_question .answer-title1 {
            background: #2155A4;
            width: 90px;
            text-align: center;
            color: white;
            line-height: 25px;
            font-family: arial;
            font-weight: bold;
        }

        .fitwp_question .question-info .answer-content {
            margin: 10px 0;
            padding: 10px;
            overflow: hidden;
            min-height: 85px;
            background: #E8E8E8 url('http://bottamnhanhung.vn/assets/front_end/img/doc-icon1.png') no-repeat left 10px top 10px;
            padding-left: 80px !important;
        }

        .answer-content {
            margin: 10px 0;
            padding: 10px;
            overflow: hidden;
            min-height: 85px;
            background: #E8E8E8 url("http://bottamnhanhung.vn/assets/front_end/img/doc-icon1.png") no-repeat left 10px top 10px;
            padding-left: 80px !important;
        }

        .fitwp_question .question-content p {
            font-size: 14px;
        }

        .fitwp_question .question-info .xem {
            float: right;
            display: inline-block;
            margin-top: 10px;
            color: #2155A4;
            font-weight: bold;
            font-size: 12px;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }
    </style>
    @php
        /** @var \Illuminate\Pagination\LengthAwarePaginator $models */
        /** @var \App\Models\Answer  $model */
    @endphp
    <div id="content" class=" mt-3">
        <h1 class="new-ques">Câu hỏi mới nhất</h1>
        @forelse($models as $model)
            <div class="fitwp_question type-fitwp_question status-publish hentry entry">
                <p class="question-title">
                </p>
                <div class="question_thumb" style="float: left;padding-right: 15px;">
                    <img src="http://bottamnhanhung.vn/assets/uploads/thumbs/anhavatar_3086587.png" style="width: 90px;height: 90px">
                    <p class="question_name">{{$model->getName()}}</p>
                </div>
                <a href="{{$model->getSlugAndId()}}" title="{{$model->getQuestion()}}">{{$model->getQuestion()}}</a><br>
                <p>{{$model->getContentQuestion()}}</p>
                <p></p>
                <div class="clearfix"></div>
                <div class="question-content  mt-1">
                    <div class="addthis_sharing_toolbox"></div>
                    <div class="question-info">
                        <div class="answer-title1">Trả lời:</div>
                        <div class="answer-content">
                            <p class="answer_summary p{{$model->id}}">{{str_limit($model->getAnswer())}}</p>
                            <a class="xem  x{{$model->id}}" href="#{{$model->id}}">@lang('website.read more')</a>
                            <div class="xem_ans mt-3" id="{{$model->id}}" style="display: none;">
                                <p>{{$model->getAnswer()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
        @include('website.partials.pagination')
        @push('scriptString')
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".xem").click(function () {
                        var id = $(this).attr("href").replace("#", "");
                        $(".xem_ans").slideUp();
                        document.getElementById(id).style.display = "block";
                        $(".p" + id).css("display", "none");
                    });
                });
            </script>
        @endpush
    </div>
@endsection