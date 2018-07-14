@extends('website.index')
@section('content')
    <style>
        .diemban_title {
            float: left;
            width: 100%;
            border-bottom: 1px solid #4587d9;
            border-top: 1px solid #4587d9;
            padding: 5px 0;
            margin: 10px 0;
            font-size: 19px;
            color: black;
            font-weight: bold;
        }

        .regions {
            float: left;
            width: 25%;
            margin: 5px 0;
        }

        .regions a {
            font-size: 14px;
            font-family: Arial;
            padding-left: 15px;
            color: #333;
        }
    </style>
    @php
        /** @var \App\Models\Category $model */
        /** @var \App\Models\Category $child */
    @endphp
    @forelse($models as $model)
        <div class="item">
            <div class="diemban_title"><i class="fa fa-globe"></i>&nbsp;{{$model->name}}</div>
            <div class="list">
                @php
                    $children = $model->getChildren()->get();
                @endphp
                @forelse($children as $child)
                    <div class="regions">
                        <a style="color: #000000;" href="{{url($child->slug)}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;{{$child->name}}<br></a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    @empty
    @endforelse
@endsection