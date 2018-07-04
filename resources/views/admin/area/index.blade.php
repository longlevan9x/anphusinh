@extends('admin.index')
@section('content')
    @include('admin.area.list', compact('models'))
@endsection