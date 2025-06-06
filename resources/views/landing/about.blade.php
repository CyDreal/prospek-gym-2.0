@extends('layouts.appLanding')

@section('title', 'Tentang Kami')

@section('content')
    <div
        class="absolute w-[600px] h-[600px] bg-orange-500/10 rounded-full blur-3xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
    </div>

    @include('landing.partials.about.hero')
    @include('landing.partials.about.visi-misi')
    @include('landing.partials.about.keunggulan')
    @include('landing.partials.about.owner')
@endsection
