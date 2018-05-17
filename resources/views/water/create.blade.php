@extends('welcome')
@section('content')
    <form action="{{route('water.store')}}" method="POST">
        {{ csrf_field() }}
        @include('water._form')
        @include('widgets.form.buttons', ['create' => true])
    </form>
@stop