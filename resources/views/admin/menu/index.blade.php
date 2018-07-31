@extends('admin.index')
@section('content')
    @include('admin.menu.list', compact('models'))
@endsection