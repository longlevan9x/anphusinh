@extends('admin.index')
@section('content')
    @include('admin.news.list', compact('models'))
@endsection