<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1; /* Ensures that main takes up all available space */
        }
    </style>
</head>
<body>
    @include('component.navbar-user')
    <main>
        @yield('content')
    </main>
    @include('component.footer-lp')
</body>
</html>