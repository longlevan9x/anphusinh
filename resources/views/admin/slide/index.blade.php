@extends('admin.index')
@section('content')
    @include('admin.slide.list', compact('models'))
@endsection