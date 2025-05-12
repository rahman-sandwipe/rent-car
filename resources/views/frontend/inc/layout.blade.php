<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Carbook - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('frontend.inc.styles')
</head>

<body>
    @include('frontend.inc.navbar')
    <!-- END nav -->

    @yield('content')

    @include('frontend.inc.footer')
    <!-- loader -->
    @include('frontend.inc.loader')
    @include('frontend.inc.scripts')
</body>

</html>
