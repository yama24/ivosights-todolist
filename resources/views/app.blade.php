<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    @if (Auth::check())
        <script>
            window.Laravel = {!! json_encode([
                'appName' => config('app.name', 'Laravel'),
                'isLoggedin' => true,
                'user' => Auth::user(),
            ]) !!}
        </script>
    @else
        <script>
            window.Laravel = {!! json_encode([
                'appName' => config('app.name', 'Laravel'),
                'isLoggedin' => false,
            ]) !!}
        </script>
    @endif
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
