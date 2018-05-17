@extends('welcome')

@section('content')
    <form action="{{route('comunals.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('comunals._form', ['object' => $object, 'tarif' => $tarif])
        @include('widgets.form.buttons')
    </form>
@stop