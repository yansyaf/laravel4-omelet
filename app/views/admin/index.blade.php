@extends('admin/layout')

@section('title')
  Dashboard
@stop

@section('header')
  @parent
@stop

@section('navbar')
  @parent
@stop

@section('content')
@parent
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    <h3>Dashboard</h3>
  </div>
</div>
@stop

@section('scripts')
@stop