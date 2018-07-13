@extends('admin.index')
@section('content')
    @include('admin.slide._form', compact('model'));
@endsection