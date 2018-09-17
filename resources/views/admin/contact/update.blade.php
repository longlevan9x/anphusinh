@extends('admin.index')
@section('content')
    @include('admin.contact._form', compact('model'));
@endsection