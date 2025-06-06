@extends('layouts.appLanding')

@section('title', 'Membership')

@section('content')
    @include('landing.partials.membership.plans')
    @include('landing.partials.membership.operational')
    @include('landing.partials.membership.faq')
    @include('landing.partials.membership.cta')
@endsection
