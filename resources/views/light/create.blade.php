@extends('welcome')
@section('content')
    <form action="{{route('light.store')}}" method="POST">
        {{ csrf_field() }}
        @include('light._form')
        @include('widgets.form.buttons', ['create' => true])
    </form>
@stop