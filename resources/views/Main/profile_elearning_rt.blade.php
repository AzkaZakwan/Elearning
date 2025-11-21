<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .table-spacing {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .logo-gradient {
            background: linear-gradient(45deg, #1e3a8a, #3b82f6);
        }

        /* Hide scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .sidebar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @media (max-width: 1024px) {
            .table-spacing {
                border-spacing: 0 8px;
            }
        }

        @media (max-width: 768px) {
            .table-spacing {
                border-spacing: 0 6px;
            }
        }
    </style>
</head>

<body class="bg-gray-400 m-0 p-0">
    <!-- Mobile Menu Button - Made sticky -->
    <div class="lg:hidden bg-white border-b border-gray-300 sticky top-0 z-30">
        <div class="relative flex items-center p-4">
            <!-- Left: Menu Toggle -->
            <button id="menuToggle" class="absolute left-4 text-gray-600 hover:text-gray-800 transition-colors">
                <i class="bi bi-list text-2xl"></i>
            </button>

            <!-- Middle: Logo -->
            <div class="flex items-center justify-center leading-tight mx-auto">
                <a href="/">
                    <img src="img/Logo Rukun Tetangga.png" class="w-14 h-14" alt="">                
                </a>
            </div>

            <!-- Right: Red Button -->
            <form action="{{ route('logout') }}" method="POST" class="absolute right-4">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-full shadow transition-colors">
                    Keluar
                </button>
            </form>
        </div>
    </div>


    <!-- Sidebar Overlay for Mobile -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="sidebar fixed left-0 top-0 h-full w-80 bg-white border-r border-gray-300 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50 lg:static lg:w-auto lg:h-auto lg:transform-none lg:border-r-0 lg:border-b lg:flex lg:items-center lg:justify-between lg:px-4 lg:py-4 lg:sticky lg:top-0 lg:z-30 lg:bg-white">

        <!-- Mobile Sidebar Content -->
        <div class="lg:hidden p-6 h-full overflow-y-auto">
            <!-- Mobile Logo -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center justify-center leading-tight">
                    <a href="/">
                        <img src="img/Logo Rukun Tetangga.png" class="w-16 h-16" alt="">
                    </a>
                </div>
                <button id="closeMenu" class="text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation Links -->
            <nav class="space-y-4">
                <a href="/beranda"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-house-door mr-3"></i>Beranda
                </a>
                <a href="/belajar"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-journal-bookmark mr-3"></i>Belajar
                </a>
                <a href="/profile"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
                    <i class="bi bi-person mr-3"></i>Profile
                </a>
            </nav>
            <!-- Mobile Keluar Button -->
            <form action="{{ route('logout') }}" method="POST">                
                <div class="absolute bottom-6 left-6 right-6">
                    @csrf
                    <button type="submit"
                    class="w-full bg-red-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-red-700 transition-colors">
                    <i class="bi bi-box-arrow-right mr-2"></i>Keluar
                </button>
            </div>
            </form>
        </div>

        <!-- Desktop Navigation Content -->
        <div class="hidden lg:flex lg:items-center lg:justify-between lg:w-full relative">
            <!-- Desktop Logo -->
            <div class="flex items-center justify-center leading-tight">
                <a href="/">
                    <img src="img/Logo Rukun Tetangga.png" class="w-16 h-16" alt="">
                </a>
            </div>

            <!-- Desktop Navigation Links (Centered) -->
            <div class="absolute left-1/2 -translate-x-1/2 flex space-x-8 xl:space-x-12">
                <a href="/beranda"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Beranda
                </a>
                <a href="/belajar"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Belajar
                </a>
                <a href="/profile"
                    class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors whitespace-nowrap">
                    Profile
                </a>
            </div>

            <!-- Desktop Keluar Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-600 text-white px-4 xl:px-6 py-2 rounded-full font-medium hover:bg-red-700 transition-colors">
                    Keluar
                </button>
            </form>
        </div>

    </div>

    {{-- Alert --}}
            @if (session('success') || session('error'))
                <div 
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 2500)"
                    x-show="show"
                    x-transition.opacity.duration.500ms
                        class="fixed top-6 left-1/2 -translate-x-1/2 z-50">
                        <div class="px-4 py-3 rounded-lg shadow-md text-white text-sm
                            {{ session('success') ? 'bg-green-600' : 'bg-red-600' }}">
                            {{ session('success') ?? session('error') }}
                                <button 
                                    @click="show = false"
                                    class="ml-3 text-white/70 hover:text-white">                                            
                                </button>
                        </div>
                </div>
            @endif
    <!-- MAIN CONTENT -->
    <div class="p-4 sm:p-6 lg:p-8 xl:p-10 mt-10">
        <div class="bg-white rounded-xl p-6 lg:p-10 shadow-lg max-w-lg mx-auto w-full">
            <div class="flex flex-col gap-10 items-center">
                <!-- FOTO PROFIL -->
                <div>
                    <img src="https://ui-avatars.com/api/?name={{ $user['nama'] }}&size=200&background=1e3a8a&color=fff"
                         class="w-40 h-40 rounded-full shadow-md border" alt="">
                </div>

                <!-- DATA USER -->
                <div class="space-y-5 text-lg">
                    <form action="{{ route('update.profile') }}" method="POST" class="flex flex-col gap-4">
                        @csrf
                        <!-- Nama -->
                        <div>
                            <label class="font-semibold text-gray-600">Nama:</label>
                            <input type="text" name="nama" value="{{ $user['nama'] }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Email (readonly) -->
                        <div>
                            <label class="font-semibold text-gray-600">Email:</label>
                            <input type="email" value="{{ $user['email'] }}" readonly class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 cursor-not-allowed">
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    </script>

</body>

</html>
