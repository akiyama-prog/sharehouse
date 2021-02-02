<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    <title>
        東京share|
        @yield('title')
    </title>
</head>

<body>
    <header>@include('layouts.header')</header>
    <main>@yield('contents')</main>
    <footer>@include('layouts.footer')</footer>
</body>

</html>