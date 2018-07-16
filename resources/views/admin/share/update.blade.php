@extends('admin.index')
@section('content')
    @include('admin.share._form', compact('model'));
@endsection