@extends('layouts.appLanding')

@section('title', 'Our Trainers')

@section('content')
    @include('landing.partials.trainers.hero')
    @include('landing.partials.trainers.list')
    @include('landing.partials.trainers.cta')
@endsection
