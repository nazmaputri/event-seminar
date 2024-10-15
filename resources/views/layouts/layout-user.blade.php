<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Default Title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Adjust the z-index of the navbar to be above the sidebar */
        .nav {
            z-index: 10;
        }
    </style>
</head>
<body class="bg-slate-100">

@include('component.sidebar-user')

    <!-- Footer -->
    <footer class="bg-white w-full shadow-md fixed bottom-0">
        <div class="container mx-auto flex justify-center items-center h-12">
            <div class="flex items-center space-x-2">
                <p class="text-sm md:text-xs text-gray-700">&copy; 2024 TechPentagon-SMKN 1 Ciomas</p>
            </div>
        </div>
    </footer>    



</body>
</html>
