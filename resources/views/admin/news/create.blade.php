@extends('admin.index')
@section('content')
    @include('admin.news._form', compact('model'))
@endsection