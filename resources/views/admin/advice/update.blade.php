@extends('admin.index')
@section('content')
    @include('admin.advice._form', compact('model'));
@endsection