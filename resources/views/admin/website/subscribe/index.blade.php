@extends('admin.index')
@section('content')
    @include('admin.website.subscribe.list', compact('models'))
@endsection