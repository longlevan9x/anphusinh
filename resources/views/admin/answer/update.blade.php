@extends('admin.index')
@section('content')
    @include('admin.answer._form', compact('model'));
@endsection