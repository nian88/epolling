<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <link href="{{ asset('vendor/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/css/poll.css') }}" rel="stylesheet">
        <script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
        @yield('css')
    </head>
    <body id="page-top">
        @include('layout._navbar')
        <br><br><br>
        <div style="min-height: 400px;">
            @yield('content')
        </div>
        @include('layout._footer')
        @yield('js')
        @stack('script')
    </body>
</html>
