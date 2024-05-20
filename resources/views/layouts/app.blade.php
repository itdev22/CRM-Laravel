<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @yield('css')
</head>
@include('layouts.header')
<div class="min-h-screen p-6 bg-base-200">
    @include('layouts.body')
</div>
@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@yield('js')

</html>
