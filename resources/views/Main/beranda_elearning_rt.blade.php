<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
                    <i class="bi bi-house-door mr-3"></i>Beranda
                </a>
                <a href="/belajar"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-journal-bookmark mr-3"></i>Belajar
                </a>
                @auth
                <a href="/profile"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-person mr-3"></i>Profile
                </a>
                @endauth 
            </nav>

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
                    class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors">
                    Beranda
                </a>
                <a href="/belajar"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Belajar
                </a>
                @auth                     
                <a href="/profile"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Profile
                </a>
                @endauth
            </div>

            <!-- Desktop Keluar Button -->
            {{-- <button
                class="bg-red-600 text-white px-4 xl:px-6 py-2 rounded-full font-medium hover:bg-red-700 transition-colors">
                Keluar
            </button> --}}
        </div>
    </div>

    <!-- Main Content -->
    <div class="p-4 sm:p-6 lg:p-8 xl:p-10">
        <div class="bg-white rounded-xl p-4 sm:p-6 lg:p-8 xl:p-10 shadow-lg max-w-full overflow-hidden">
            <!-- Content -->
            <div class="p-2">
                <h1 class="text-4xl font-bold mb-2">E-Learning RT</h1>
                <p class="text-lg text-gray-700 mb-8">Website Belajar RT</p>

                <p class="text-base leading-relaxed mb-6 text-gray-800">
                    Selamat datang di <span class="font-semibold">E-Learning RT</span>!
                    Website ini hadir sebagai ruang belajar bersama untuk seluruh warga.
                    Dengan semangat gotong royong, kita ingin menciptakan lingkungan yang
                    tidak hanya nyaman untuk ditinggali, tetapi juga kaya akan pengetahuan
                    dan pengalaman yang dapat dibagikan.
                </p>

                <p class="text-base leading-relaxed mb-6 text-gray-800">
                    Melalui platform ini, Anda dapat menemukan berbagai materi pembelajaran,
                    mulai dari keterampilan sehari-hari seperti mengelola keuangan keluarga,
                    tips kesehatan, hingga panduan teknologi yang bermanfaat di era digital.
                    Kami juga menyediakan informasi mengenai kegiatan lingkungan, edukasi anak,
                    serta wawasan umum yang relevan dengan kebutuhan masyarakat RT.
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800">
                    Tidak hanya itu, <span class="font-semibold">E-Learning RT</span>
                    juga mendukung program pelatihan warga, seminar daring, dan forum diskusi
                    interaktif. Dengan adanya kegiatan ini, diharapkan setiap orang dapat
                    menambah keterampilan baru, memperluas jaringan pertemanan, serta
                    memperkuat rasa kebersamaan di lingkungan kita.
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800">
                    Tujuan utama website ini adalah memberikan kemudahan akses belajar tanpa
                    mengenal batas usia, waktu, maupun latar belakang. Baik anak-anak, remaja,
                    orang tua, maupun lansia dapat berpartisipasi sesuai minat dan kebutuhannya.
                    Dengan kata lain, <span class="font-semibold">belajar tidak harus di sekolah,
                        tapi bisa dimulai dari lingkungan terdekat, yaitu RT kita sendiri.</span>
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800">
                    Mari jadikan <span class="font-semibold">E-Learning RT</span>
                    sebagai pusat pengetahuan dan sumber inspirasi. Setiap warga dapat berkontribusi
                    dengan membagikan pengalaman, artikel, atau ide-ide kreatif yang nantinya
                    bisa bermanfaat bagi orang lain. Dengan berbagi, kita tidak hanya memberi,
                    tetapi juga memperkaya diri sendiri.
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800">
                    Harapan kami, website ini dapat terus berkembang menjadi sarana edukasi
                    yang relevan, menyenangkan, dan bermanfaat jangka panjang. Karena pada
                    akhirnya, kualitas lingkungan bukan hanya dilihat dari kebersihan dan keamanan,
                    tetapi juga dari sejauh mana warganya mampu terus belajar dan bertumbuh.
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800">
                    Yuk, mulai jelajahi materi yang tersedia, ikuti kegiatan yang menarik,
                    dan jangan ragu untuk berbagi ilmu maupun pengalaman Anda. Karena
                    <span class="italic">belajar itu lebih bermakna jika dilakukan bersama-sama</span>.
                </p>

                <p class="text-base leading-relaxed mt-6 text-gray-800 font-medium">
                    "Belajar bersama, tumbuh bersama, maju bersama."
                </p>
            </div>
        </div>
    </div>
    <div class="fixed bottom-6 right-6 z-50">
        <div class="bg-white shadow-lg rounded-xl p-4 flex flex-col gap-3 border border-gray-300">
            <div class="flex items-center gap-3">
                <i class="bi bi-whatsapp text-green-600 text-2xl"></i>
                <a href="https://wa.me/6281234567890" target="_blank" class="text-gray-800 font-medium hover:text-green-600">
                    0831-3351-7514
                </a>
            </div>
            <div class="flex items-center gap-3">
                <i class="bi bi-envelope-fill text-blue-600 text-xl"></i>
                <a href="mailto:lokalhp1@gmail.com" class="text-gray-800 font-medium hover:text-blue-600">
                     lokalhp1@gmail.com
                </a>
            </div>
        </div>
    </div>
    <script>
        // Mobile menu functionality
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        menuToggle.addEventListener('click', openSidebar);
        closeMenu.addEventListener('click', closeSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Close sidebar on window resize if screen becomes large
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });

        // Handle escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });
    </script>
</body>

</html>