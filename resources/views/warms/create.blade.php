@extends('welcome')
@section('content')
    <form action="{{route('warms.store')}}" method="POST">
        {{ csrf_field() }}
        @include('warms._form')
        @include('widgets.form.buttons', ['create' => true])
    </form>
@stop