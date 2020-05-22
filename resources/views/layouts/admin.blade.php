@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @yield('content')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
@stop

@section('js')
    <script src="{{asset('/js/admin.js')"></script>
@stop