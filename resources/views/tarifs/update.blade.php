@extends('welcome')

@section('content')
    <form action="{{route('tarifs.upd', ['id' => $object->id])}}" method="POST">
        {{ csrf_field() }}
        @include('tarifs._form', ['object' => $object])
        @include('widgets.form.buttons')
    </form>
@stop