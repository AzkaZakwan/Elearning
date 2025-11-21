<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
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

        .file-item {
            transition: all 0.3s ease;
        }

        .file-item:hover {
            background-color: #f9fafb;
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
                    <img src= "{{ asset('img/Logo Rukun Tetangga.png') }}" class="w-16 h-16" alt="" >                                
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
                        <img src= "{{ asset('img/Logo Rukun Tetangga.png') }}" class="w-16 h-16" alt="" >                                
                    </a>
                </div>
                <button id="closeMenu" class="text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation Links -->
            <nav class="space-y-4">
                <a href="/kelolaMateri"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-gear mr-3"></i>Kelola Materi
                </a>
                <a href="/uploadMateri"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-plus-circle mr-3"></i>Tambah Materi
                    
                </a>
                <a href="/kelolaReport"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
                    <i class="bi bi-envelope-exclamation mr-3"></i>Kelola Report
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
                    <img src= "{{ asset('img/Logo Rukun Tetangga.png') }}" class="w-16 h-16" alt="" >                                
                </a>
            </div>

            <!-- Desktop Navigation Links (Centered) -->
            <div class="absolute left-1/2 -translate-x-1/2 flex space-x-8 xl:space-x-12">
                <a href="/kelolaMateri"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Kelola Materi
                </a>
                <a href="/uploadMateri"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Tambah Materi
                </a>
                <a href="/kelolaReport"
                    class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors whitespace-nowrap">
                    Kelola Report
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

     <div class="p-4 sm:p-6 lg:p-8 xl:p-10">
        <div class="bg-white rounded-xl p-6 shadow-lg">

            <h2 class="text-2xl font-bold text-center mb-6">Daftar Report Komentar</h2>

            <!-- ALERT -->
            @if (session('success') || session('error') || $errors->any())
                <div 
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 2000)"
                    x-show="show"
                    x-transition.opacity.duration.500ms
                    class="fixed top-6 left-1/2 -translate-x-1/2 z-50">

                    {{-- Sukses --}}
                    @if(session('success'))
                        <div class="px-4 py-3 rounded-lg shadow-md text-white text-sm bg-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error Manual --}}
                    @if(session('error'))
                        <div class="px-4 py-3 rounded-lg shadow-md text-white text-sm bg-red-600">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Error Validasi --}}
                    @if($errors->any())
                        <div class="px-4 py-3 rounded-lg shadow-md text-white text-sm bg-red-600">
                            <strong>Terjadi kesalahan</strong>
                            <ul class="mt-1 ml-4 list-disc">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endif

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full table-spacing">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 text-sm">
                            <th class="py-3 px-4 text-left">Nama Warga</th>
                            <th class="py-3 px-4 text-left">Komentar</th>
                            <th class="py-3 px-4 text-left">Materi</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($komentar as $komen)
                            <tr class="bg-white shadow-sm file-item">
                                <td class="py-3 px-4">{{ $komen->warga->nama }}</td>
                                <td class="py-3 px-4">{{ $komen->komen }}</td>
                                <td class="py-3 px-4">{{ $komen->materi->judul }}</td>

                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('abaikanReport', $komen->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="button"
                                            onclick="showConfirmation('abaikan', this.closest('form'))"
                                            class="bg-green-600 text-white text-sm px-3 py-2 rounded-lg hover:bg-green-700">
                                            Abaikan
                                        </button>
                                    </form>

                                    <form action="{{ route('hapusReport', $komen->id) }}" method="POST"
                                        class="inline-block ml-2">
                                        @csrf                                        
                                        <button type="button"
                                            onclick="showConfirmation('hapus', this.closest('form'))"
                                            class="bg-red-600 text-white text-sm px-3 py-2 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-600">
                                    Tidak ada komentar yang dilaporkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-[9999]">
        <div class="bg-white p-6 rounded-xl shadow-xl w-80 text-center">
            <h2 id="confirmTitle" class="text-lg font-bold mb-3">Konfirmasi</h2>
            <p id="confirmMessage" class="text-sm text-gray-700 mb-6"></p>

            <div class="flex justify-center space-x-4">
                <button id="cancelBtn"
                    class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
                    Batal
                </button>

                <button id="confirmBtn"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Ya
                </button>
            </div>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }

        menuToggle.onclick = openSidebar;
        closeMenu.onclick = closeSidebar;
        sidebarOverlay.onclick = closeSidebar;

        let formToSubmit = null;

        function showConfirmation(type, form) {
            formToSubmit = form;

            const modal = document.getElementById('confirmModal');
            const title = document.getElementById('confirmTitle');
            const msg = document.getElementById('confirmMessage');
            const confirmBtn = document.getElementById('confirmBtn');

            if (type === 'hapus') {
                title.innerText = "Konfirmasi Hapus";
                msg.innerText = "Apakah Anda yakin ingin menghapus komentar ini?";
                confirmBtn.classList.remove("bg-green-600");
                confirmBtn.classList.add("bg-red-600");
            } else {
                title.innerText = "Konfirmasi Abaikan";
                msg.innerText = "Abaikan laporan untuk komentar ini?";
                confirmBtn.classList.remove("bg-red-600");
                confirmBtn.classList.add("bg-green-600");
            }

            modal.classList.remove('hidden');
        }

        document.getElementById('cancelBtn').addEventListener('click', function () {
            document.getElementById('confirmModal').classList.add('hidden');
            formToSubmit = null;
        });

        document.getElementById('confirmBtn').addEventListener('click', function () {
            if (formToSubmit) formToSubmit.submit();
        });
    </script>

</body>

</html>