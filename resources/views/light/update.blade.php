@extends('welcome')

@section('content')
    <form action="{{route('light.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('light._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop