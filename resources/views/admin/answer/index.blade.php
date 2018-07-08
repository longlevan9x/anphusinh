@extends('admin.index')
@section('content')
    @include('admin.answer.list', compact('models'))
@endsection