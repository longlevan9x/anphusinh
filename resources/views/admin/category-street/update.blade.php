@extends('admin.index')
@section('content')
    @include('admin.category-street._form', compact('model'));
@endsection