@extends('admin.index')
@section('content')
    @include('admin.order._form', compact('model'));
@endsection