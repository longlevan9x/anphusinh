@extends('admin.index')
@section('content')
    @include('admin.order.list', compact('models'))
@endsection