@extends('admin.index')
@section('content')
    @include('admin.menu._form', compact('model'))
@endsection