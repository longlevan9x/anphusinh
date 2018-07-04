@extends('admin.index')
@section('content')
    @include('admin.area._form', compact('model'));
@endsection