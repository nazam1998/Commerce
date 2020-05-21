@extends('layouts.app')

@section('content')
    @include('components.search')
    @include('partials.header')
    @include('components.hero')
    @include('partials.features')
    @include('partials.products')
    @include('components.lookbook')
    @include('components.logo')
    @include('partials.footer')
@endsection