@extends('layouts.appLanding')

@section('title', 'Prospek Gym')

@section('content')
    @include('landing.partials.index.hero')
    @include('landing.partials.index.features')
    @include('landing.partials.index.join')
    @include('landing.partials.index.footer')
@endsection
