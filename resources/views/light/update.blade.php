@extends('welcome')

@section('content')
    <form action="{{route('light.update', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('light._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop