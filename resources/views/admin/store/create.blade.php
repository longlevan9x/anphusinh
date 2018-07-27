@extends('admin.index')
@section('content')
    @include('admin.store._form', compact('model'))
@endsection