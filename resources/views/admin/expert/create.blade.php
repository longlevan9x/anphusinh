@extends('admin.index')
@section('content')
    @include('admin.expert._form', compact('model'))
@endsection