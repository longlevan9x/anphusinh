@extends('admin.index')
@section('content')
    @include('admin.category-district.list', compact('models'))
@endsection