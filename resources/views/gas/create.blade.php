@extends('welcome')
@section('content')
    <form action="{{route('gas.store')}}" method="POST">
        {{ csrf_field() }}
        @include('gas._form')
        @include('widgets.form.buttons', ['create' => true])
    </form>
@stop