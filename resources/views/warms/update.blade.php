@extends('welcome')

@section('content')
    <form action="{{route('warms.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('warms._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop