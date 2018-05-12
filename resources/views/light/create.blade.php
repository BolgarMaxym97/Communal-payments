@extends('admin.layouts.main')
@section('content')
    {!! Form::open(['route' => 'admin.staff-directors.store', 'files' => true]) !!}
    @include('admin.widgets.form.buttons', ['create' => true])
    @include('admin.staff.directors._form')
    @include('admin.widgets.form.buttons', ['create' => true])
    {!! Form::close() !!}
@stop