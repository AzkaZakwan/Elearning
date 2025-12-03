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
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
                    <i class="bi bi-gear mr-3"></i>Kelola Materi
                </a>
                <a href="/uploadMateri"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="bi bi-plus-circle mr-3"></i>Tambah Materi
                    
                </a>
                <a href="/kelolaReport"
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
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
                    class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors whitespace-nowrap">
                    Kelola Materi
                </a>
                <a href="/uploadMateri"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Tambah Materi
                </a>
                <a href="/kelolaReport"
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
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

    <!-- Main Content -->
    <div class="p-4 sm:p-6 lg:p-8 xl:p-10">
        <div class="bg-white rounded-xl p-4 sm:p-6 lg:p-8 xl:p-10 shadow-lg max-w-full overflow-hidden">
            <!-- Content -->
            <div class="p-0">
                <h1 class="text-2xl lg:text-3xl font-bold text-center lg:-mt-5 -mt-3">
                    Materi 
                </h1>
                <form action="{{ route('kelolaSearch') }}" method="GET" 
                    class="mt-6 mb-4 flex justify-end">
                    <input type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari materi..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-64 shadow-sm focus:ring-blue-500 focus:border-blue-500">

                    <button type="submit"
                            class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                {{-- Alert --}}
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

                @if(isset($editMode) && $editMode && $materiEdit)
                <div class="bg-blue-50 border-l-4 border-blue-600 p-5 rounded-lg mt-6">
                    <h2 class="text-xl font-semibold mb-4 text-blue-700">Edit Materi</h2>

                    <form action="{{ route('editMateri', $materiEdit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label class="block font-medium">Judul</label>
                        <input type="text" 
                            name="judul" 
                            value="{{ old('judul', $materiEdit->judul) }}"
                            class="w-full border p-2 rounded mt-1">

                        <label class="block font-medium mt-4">Deskripsi</label>
                        <textarea name="deskripsi"
                                class="w-full border p-2 rounded mt-1"
                                rows="6">{{ old('deskripsi', $materiEdit->deskripsi) }}</textarea>

                        <div class="mt-4 flex gap-3">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Update
                            </button>
                            <a href="{{ route('kelolaMateri') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
                @endif
                <!-- Table Container -->
                <div class="overflow-x-auto rounded-xl shadow-md lg:mt-5 mt-3">
                    <table class="w-full min-w-[640px] divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-gray-700 font-semibold py-3 px-4 text-left text-sm">No</th>
                                <th class="text-gray-700 font-semibold py-3 px-4 text-left text-sm">Judul</th>
                                <th class="text-gray-700 font-semibold py-3 px-4 text-center text-sm">Aksi</th>
                            </tr>
                        </thead>                        
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($materi as $kelola => $materis)
                                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                                    <td class="py-3 px-4 text-sm text-gray-600">
                                        {{$kelola + 1}}
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-800">
                                        {{$materis->judul}}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex flex-nowrap items-center gap-2 justify-center">
                                            {{-- diskusi --}}
                                            <a href="{{route('deskripsi', ['id' => $materis->id, 'slug' => Str::slug($materis->judul)]) }}" 
                                                class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-sm font-medium hover:bg-blue-700 transition">
                                                Diskusi                                        
                                            </a>
                                            {{-- Edit --}}
                                            <a href="{{ route('kelolaMateri', ['id' => $materis->id]) }}"
                                            class="bg-green-600 text-white px-4 py-1.5 rounded-full text-sm font-medium hover:bg-green-700 transition">
                                                Edit
                                            </a>
                                            {{-- Delete --}}
                                            <form id="deleteForm{{ $materis->id }}" action="{{ route('hapusMateri', $materis->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="button"
                                                    onclick="customConfirm('Yakin ingin menghapus materi ini?', () => document.getElementById('deleteForm{{ $materis->id }}').submit())"
                                                    class="bg-red-600 text-white px-4 py-1.5 rounded-full text-sm font-medium hover:bg-red-700 transition">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- confirm alert --}}
    <div id="confirmModal"
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-[999] hidden">
        <div class="bg-white p-6 rounded-xl shadow-xl w-80 text-center">
            <h3 class="text-lg font-semibold mb-3">Konfirmasi</h3>
            <p id="confirmMessage" class="text-gray-700 mb-6">Yakin ingin melanjutkan?</p>

            <div class="flex justify-center gap-3">
                <button id="cancelBtn"
                    class="px-4 py-2 rounded-lg bg-gray-500 text-white hover:bg-gray-600">
                    Batal
                </button>
                <button id="okBtn"
                    class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                    Ya
                </button>
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

        let confirmCallback = null;
        function customConfirm(message, callback) {
            document.getElementById("confirmMessage").innerText = message;
            document.getElementById("confirmModal").classList.remove("hidden");
            confirmCallback = callback;
        }

        document.getElementById("cancelBtn").onclick = function () {
            document.getElementById("confirmModal").classList.add("hidden");
            confirmCallback = null;
        };

        document.getElementById("okBtn").onclick = function () {
            document.getElementById("confirmModal").classList.add("hidden");
            if (confirmCallback) confirmCallback();
        };

    </script>
        
</body>

</html>