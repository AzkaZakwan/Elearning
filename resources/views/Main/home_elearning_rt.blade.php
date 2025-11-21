<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warga Belajar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .sidebar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .book-anim {
            animation: floatBook 3s ease-in-out infinite;
        }

        @keyframes floatBook {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-12px);
            }
        }
    </style>
</head>

<body class="bg-gray">

    <!-- Mobile Top Bar -->
    <div class="lg:hidden bg-white border-b shadow-sm sticky top-0 z-30">
        <div class="flex items-center p-4">
            <button id="menuToggle" class="mr-4 text-gray-700 text-2xl">
                <i class="bi bi-list"></i>
            </button>
            <img src="img/Logo Rukun Tetangga.png" class="w-16 h-16 mx-auto" alt="">
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="sidebar fixed left-0 top-0 h-full w-72 bg-white border-r shadow-lg transform -translate-x-full transition-transform duration-300 z-50 lg:static lg:h-auto lg:w-auto lg:translate-x-0 lg:border-none lg:shadow-none">

        <!-- Mobile Sidebar -->
        <div class="lg:hidden p-6">
            <div class="flex justify-between items-center mb-8">
                <img src="img/Logo Rukun Tetangga.png" class="w-16 h-16" alt="">
                <button id="closeMenu" class="text-gray-700 text-2xl"><i class="bi bi-x-lg"></i></button>
            </div>

            <nav class="space-y-4">
                <a href="{{route('beranda')}}"
                    class="block text-gray-700 font-semibold py-3 px-4 rounded-lg hover:bg-gray-100">
                    <i class="bi bi-house-door mr-2"></i> Beranda
                </a>
                <a href="/belajar"
                    class="block text-gray-700 font-semibold py-3 px-4 rounded-lg hover:bg-gray-100">
                    <i class="bi bi-journal-bookmark mr-2"></i> Belajar
                </a>
            </nav>
        </div>

        <!-- Desktop Navbar -->
        <div class="hidden lg:flex items-center justify-between w-full py-4 px-6 bg-white sticky top-0 shadow-sm">
            <img src="img/Logo Rukun Tetangga.png" class="w-16 h-16" alt="">

            <div class="flex space-x-10">
                <a href="{{route('beranda')}}" class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">Beranda</a>
                <a href="/belajar" class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">Belajar</a>
            </div>

            <button onclick="window.location='{{route('login')}}'"
                class="bg-blue-600 px-5 py-2 text-white rounded-full font-semibold hover:bg-blue-700">
                Masuk
            </button>
        </div>

    </div>

    <!-- Hero Section -->
    <section class="text-gray-900 min-h-screen flex items-center justify-center px-6 py-20">
        <div class="max-w-4xl text-center">

            <img src="img/Logo_E_learning.png" class="w-28 sm:w-40 mx-auto mb-6 book-anim" alt="">

            <h1 class="text-4xl sm:text-5xl font-extrabold">
                Selamat Datang di <br> E-Learning RT
            </h1>

            <p class="text-lg sm:text-xl mt-4 opacity-80">
                Platform belajar digital untuk meningkatkan literasi dan keterampilan warga
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <button onclick="window.location='{{route('viewRegister')}}'"
                    class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-full shadow hover:bg-blue-700 transition">
                    Belum Punya Akun?
                </button>

                <button onclick="window.location='{{route('login')}}'"
                    class="bg-gray-200 text-gray-800 px-6 py-3 font-semibold rounded-full hover:bg-gray-300 transition">
                    Sudah Punya Akun
                </button>
            </div>

        </div>
    </section>

    <!-- Script Sidebar -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        const openSidebar = () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        };

        const hideSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        };

        menuToggle?.addEventListener('click', openSidebar);
        closeMenu?.addEventListener('click', hideSidebar);
        overlay?.addEventListener('click', hideSidebar);
    </script>

</body>
</html>