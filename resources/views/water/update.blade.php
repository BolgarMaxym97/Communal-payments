@extends('welcome')

@section('content')
    <form action="{{route('water.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('water._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop