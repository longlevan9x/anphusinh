@extends('admin.index')
@section('content')
    @include('admin.category-city.list', compact('models'))
@endsection