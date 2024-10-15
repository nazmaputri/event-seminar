    <!-- Navbar -->
    <nav class="nav fixed top-0 left-0 right-0 bg-white shadow-md p-3 z-20">
        <div class="container mx-auto flex justify-between items-center">
            <button class="flex md:hidden border-2 border-slate-300 rounded-lg p-1 text-slate-900 ml-3 active:bg-white focus:outline-none focus:ring focus:ring-blue-300" id="menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                </svg>                  
            </button>
            <!-- Profile Icon -->
            <a href="#" class="flex items-center ml-auto space-x-2">
                <p class="text-sm md:text-md">admin</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 rounded-full text-gray-400 border-gray-300">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </nav>

    <!-- Sidebar and Content Wrapper -->
    <div class="flex pt-16"> <!-- Added padding top to account for the navbar height -->
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 left-0 w-60 h-screen bg-white p-4 shadow-lg z-10 transform -translate-x-full transition-transform duration-300 md:translate-x-0 md:block">
            <button id="close-button" class="block md:hidden mt-2 ml-auto border-2 border-blue-200 rounded-lg p-1 active:bg-white focus:outline-none focus:ring focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        
            <hr class="mx-auto mt-36">

            <ul class="space-y-4 mt-8">
                <a href="{{ route('dashboard') }}">
                    <li class="flex items-center space-x-3 text-blue-800 hover:bg-blue-500 py-3 rounded-xl px-8 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>
                        <p class="text-md md:text-sm font-medium">Dashboard</p>
                    </li>
                </a>
                
                <a href="{{ route('event-admin') }}">
                    <li class="flex items-center space-x-3 text-blue-800 hover:bg-blue-500 py-3 rounded-xl px-8 hover:text-white mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-md md:text-sm font-medium">Event</p>
                    </li>
                </a>
            </ul>
        
            <hr class="mx-auto mt-8">
        
            <!-- Tombol Logout di Sidebar -->
            <div id="logout" class="flex items-center space-x-3 text-red-800 border border-red-400 hover:bg-red-400 hover:text-white focus:active:bg-red-300 focus:outline-none focus:ring focus:ring-red-300 p-2 rounded-full mt-40 px-12 mx-3 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="w-5 h-5">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                </svg>
                <span class="text-sm font-medium">Logout</span>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 md:ml-60 mb-36">
            @yield('content')
        </main>
    </div>


<!-- Modal Popup Konfirmasi Logout -->
<div id="confirmationLogout" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50 text-sm md:text-xs">
    <div class="bg-white py-6 px-12 rounded-lg shadow-lg">
        <p class="text-center text-gray-700">Yakin mau logout?</p>
        <div class="mt-4 flex justify-center gap-6">
            <button id="cancelLogout" class="bg-white text-green-500 border border-green-500 py-2 px-4 rounded-xl hover:bg-green-500 hover:text-white">Tidak</button>
            <button id="confirmLogout" class="bg-white border border-red-500 text-red-500 py-2 px-4 rounded-xl hover:bg-red-500 hover:text-white">Ya</button>
        </div>
    </div>
</div>

<!-- JavaScript untuk Sidebar dan Logout -->
<script>
    // Sidebar Toggle Functionality
    const menuButton = document.getElementById('menu-button');
    const closeButton = document.getElementById('close-button');
    const sidebar = document.getElementById('sidebar');

    menuButton.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
    });

    closeButton.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });

    // Logout Confirmation Popup
    const logoutButton = document.getElementById('logout');
    const confirmationPopup = document.getElementById('confirmationLogout');
    const cancelLogoutButton = document.getElementById('cancelLogout');
    const confirmLogoutButton = document.getElementById('confirmLogout');

    logoutButton.addEventListener('click', (event) => {
        event.preventDefault();
        console.log('Logout button clicked');  // Debugging
        confirmationPopup.classList.remove('hidden');
    });

    cancelLogoutButton.addEventListener('click', () => {
        confirmationPopup.classList.add('hidden');
    });

    confirmLogoutButton.addEventListener('click', () => {
        console.log('Confirmed logout');  // Debugging
        window.location.href = '/login';
    });
</script>
