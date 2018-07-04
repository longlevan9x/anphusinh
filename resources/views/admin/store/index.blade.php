@extends('admin.index')
@section('content')
    @include('admin.store.list', compact('models'))
@endsection