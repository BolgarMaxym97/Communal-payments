@extends('welcome')
@section('content')
    <form action="{{route('comunals.store')}}" method="POST">
        {{ csrf_field() }}
        @include('comunals._form', ['tarif' => $tarif])
        @include('widgets.form.buttons', ['create' => true])
    </form>
@stop