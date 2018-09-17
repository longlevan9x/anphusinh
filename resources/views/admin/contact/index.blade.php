@extends('admin.index')
@section('content')
    @include('admin.contact.list', compact('models'))
@endsection