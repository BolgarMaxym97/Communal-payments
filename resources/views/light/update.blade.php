@extends('admin.layouts.main')

@section('content')
    {!! Form::open(['route' => ['admin.staff-directors.update', 'staff' => $staff->id], 'method' => 'PUT', 'files' => true]) !!}
        @include('admin.widgets.form.buttons')
        @include('admin.staff.directors._form', ['staff' => $staff])
        @include('admin.widgets.form.buttons')
    {!! Form::close() !!}
@stop