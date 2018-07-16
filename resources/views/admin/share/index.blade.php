@extends('admin.index')
@section('content')
    @include('admin.share.list', compact('models'))
@endsection