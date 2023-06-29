<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dc Comics</title>
    @vite('resources/js/app.js')
</head>

<body data-bs-theme="dark">
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
