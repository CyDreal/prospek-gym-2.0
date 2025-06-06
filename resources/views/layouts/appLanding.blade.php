<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html lang="en" x-data="{ dark: false }" :class="{ 'dark': dark }" x-init="dark = window.matchMedia('(prefers-color-scheme: dark)').matches"> --}}

<head>
    @include('partials.head')
</head>

<body class="font-sans antialiased relative bg-neutral-900">
    @include('components.navbar')

    <main>
        @yield('content')
    </main>
</body>

</html>
