@extends('admin.index')
@section('content')
    @include('admin.advice.list', compact('models'))
@endsection