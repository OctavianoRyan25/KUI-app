<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    {{-- <script type="module" src="{{ asset('build/assets/app-C1-XIpUa.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-7faw23md.css') }}">
    @yield('ex-css') --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js" defer></script> --}}
    {{-- @vite('resources/css/app.css') --}}
    <script type="module" src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Czl1uA6v.css') }}">
</head>

<body class="bg-gray-100">
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="flex flex-wrap md:min-h-screen md:flex-nowrap">
        <!-- Sidebar -->
        <div @click.away="open = false"
            class="flex flex-col w-full md:w-64 text-white bg-[#003d7a] dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
            x-data="{ open: false }">
            <div class="flex-shrink-0 px-8 py-4 md:mt-10 flex flex-row items-center justify-between">
                <a href="#"
                    class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <img src="{{ asset('assets/logo-udinus.png') }}" alt="" srcset=""
                        class="h-10 w-10 md:h-20 md:w-20">
                </a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'block': open, 'hidden': !open }"
                class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{ request()->is('admin/dashboard') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/dashboard">Home</a>
                {{-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Peserta</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/table/user">Event</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/table/all-data">Kebutuhan Mahasiswa</a>
                        </div>
                    </div>
                </div> --}}
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{ request()->is('admin/event') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/event">Event</a>
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{ request()->is('admin/peserta') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/peserta">Peserta</a>
                {{-- <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{ request()->is('admin/letter') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/letter">Letter</a> --}}
                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline {{ request()->is('admin/research-collaboration') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/research-collaboration">Kolaborasi Penelitian</a>
                <a class="bg-transparent text-white mt-2 py-2 px-4 block text-sm font-semibold rounded-lg hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none focus:shadow-outline {{ request()->is('admin/kerja-sama*') ? 'bg-yellow-500 text-black' : '' }}"
                    href="/admin/kerja-sama">Kerja Sama</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="block w-full px-4 py-2 mt-2 text-sm font-semibold text-start text-white bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Logout</button>
                </form>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex flex-col w-full">
            <nav
                class="bg-white shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1),0_2px_4px_-1px_rgba(0,0,0,0.06)] hidden md:flex">
                <div class="container mx-auto px-6 py-3">
                    <div class="flex items-center justify-between">
                        <div class="text-white">
                            <a href="#" class="text-lg font-semibold">UDINUS</a>
                        </div>
                        <div class="hidden md:block">
                            <!-- Add navigation links or buttons here -->
                        </div>
                        <div class="flex md:hidden">
                            <button type="button"
                                class="text-gray-500 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                    <path d="M4 5h16M4 12h16M4 19h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Content -->
            @include('sweetalert::alert')
            @yield('content')
            {{-- Footer --}}
            <footer class="py-4 mt-8 border-t">
                <div class="container mx-auto px-4 flex justify-between items-center">
                    <p class="text-gray-600">&copy; 2024 All rights reserved. Developed by LKUI UDINUS</p>
                    <div class="flex space-x-4">
                        <a title="facebook" href="https://www.facebook.com/udinus.smg"
                            class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-ou hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                            </svg>
                        </a>
                        <a title="twitter" href="https://twitter.com/udinusofficial"
                            class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15" />
                            </svg>
                        </a>
                        <a title="instagram" href="https://www.instagram.com/udinusofficial/"
                            class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                            </svg>
                        </a>
                        <a title="tiktok" href="https://www.tiktok.com/@udinusofficial"
                            class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path
                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</body>

</html>
