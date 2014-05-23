@extends('layout')

@section('title')
  @parent Login
@stop

@section('header')
    @parent
    {{ HTML::style('css/site.css') }}
@stop

@section('navbar')
    @parent
@stop

@section('content')
<h2>Administration</h2>
@stop