<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event-Seminar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 pt-[60px]">

<nav class="bg-white md:drop-shadow-xl fixed top-0 w-full z-50">
    <div class="mx-auto max-w-7xl px-5 md:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center">
                <!-- Logo or Text -->
                <a href="#" class="text-lg font-semibold"><span class="text-blue-900">#Eventseminar</span></a>
            </div>
            <!-- Menu Button for Mobile -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:hidden">
                <button id="menu-button" class="text-gray-500 hover:text-gray-700 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
            <!-- Menu Items -->
            <div id="menu" class="hidden sm:flex sm:items-center sm:ml-auto space-x-4">
                <a href="{{ route('landing-page') }}" class="rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Beranda</a>
                <a href="{{ route('event-lp') }}" class="rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Event</a>
                <a href="{{ route('login') }}" class="rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Masuk</a>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="absolute inset-x-0 top-16 origin-top-right bg-white shadow-lg ring-1 ring-black ring-opacity-5 transform scale-y-0 transition-transform duration-300 ease-in-out sm:hidden">
                <div class="space-y-2 p-2">
                    <a href="" class="block rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Beranda</a>
                    <a href="" class="block rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Event</a>
                    <a href="" class="block rounded-md px-2 py-3 text-sm font-medium hover:bg-blue-400 hover:text-white">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</nav>

@vite('resources/js/app.js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('scale-y-100');
            mobileMenu.classList.toggle('scale-y-0');
        });
    });
</script>

</body>
</html>