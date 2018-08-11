@extends('website.index')
@section('content')
    <div class="detail_content">
        {!! $model->value ?? '' !!}
    </div>
@endsection