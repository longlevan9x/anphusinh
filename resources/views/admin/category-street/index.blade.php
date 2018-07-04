@extends('admin.index')
@section('content')
    @include('admin.category-street.list', compact('models'))
@endsection