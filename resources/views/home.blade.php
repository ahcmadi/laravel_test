@extends('ui::layouts.app')

@section('content')
    <h1> You are Login As {{ auth()->user()->name}} </h1>
@stop
