@extends('welcome')

@section('content')
    <form action="{{route('gas.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('gas._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop