<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$materi->judul}}</title>
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
                        <img src="{{ asset('img/Logo Rukun Tetangga.png') }}" class="w-16 h-16" alt="">
                    </a>
                </div>
                <button id="closeMenu" class="text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation Links -->
            <nav class="space-y-4">
                @if(session('user') && session('user')['role'] == 'admin')                              
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
                @else
                    <a href="/beranda"
                        class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="bi bi-house-door mr-3"></i>Beranda
                    </a>
                    <a href="/materi"
                        class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
                        <i class="bi bi-journal-bookmark mr-3"></i>Belajar
                    </a>
                    <a href="/profile"
                        class="block text-gray-800 font-medium py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                        <i class="bi bi-person mr-3"></i>Profile
                    </a> 
                @endif
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
                @if(session('user') && session('user')['role'] == 'user') 
                    <a href="/beranda"
                        class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                        Beranda
                    </a>
                    <a href="/belajar"
                        class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors whitespace-nowrap">
                        Belajar
                    </a>
                    <a href="/profile"
                        class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                        Profile
                    </a>      
                @else
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
                @endif
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
            <div class="bg-gray-200 rounded-xl shadow-md overflow-hidden">
                <div class="px-4 py-4 sm:px-6 flex items-center justify-between">
                    <i class="bi bi-filetype-pdf text-3xl text-red-500 sm:text-4xl"></i>

                    <h2 class="text-center text-lg sm:text-xl font-bold text-gray-800 flex-grow px-2">
                        {{$materi->judul}}
                    </h2>
                    {{-- download --}}
                    <a href="{{ route('download' , $materi->id) }}" 
                        class="flex items-center gap-1 text-blue-600 hover:text-blue-800 transition text-sm font-medium">
                        <i class="bi bi-download"></i> 
                        Unduh
                    </a>                
                    
                </div>

                <div class="border-t border-gray-500"></div>

                <div class="px-4 py-6 sm:px-6">
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base text-center max-w-2xl mx-auto">
                        {{$materi->deskripsi}}
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 sm:p-6 lg:p-8 xl:p-10 shadow-lg max-w-full overflow-hidden mt-8 lg:mt-10">
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
            <!-- Discussion Section -->
            <div class="bg-white-200 rounded-xl shadow-md p-6">
                <h2 class="text-xl text-center font-bold mb-6" >Diskusi</h2>                                
                <!-- Discussion Messages -->
                <div>
                    @foreach ($materi->komentar as $komen)
                        <div class="bg-white rounded-xl p-4">
                            <div class="flex justify-between items-center">
                                <p class="font-bold mb-1">{{$komen->warga->nama}}</p>                                
                                @if (session('user'))
                                {{-- three dots vertical --}}
                                <div class="relative inline-block text-left">
                                    <button class="menu-button text-gray-500 hover:text-gray-800">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button> 
                                    {{-- dropdown edit & delete --}}
                                    <div class="menu-dropdown origin-top-right absolute right-3 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                                        <div class="py-1 text-sm text-gray-700">                                        
                                            @if (session('user')['id'] == $komen->warga_id)
                                                <button type="button" onclick="showEditForm({{ $komen->id }})" 
                                                    onclick="event.stopPropagation(); showEditForm({{$komen->id}}, '{{e($komen->komen)}}')" 
                                                    class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                    Edit
                                                </button>

                                                <form id="deleteForm{{$komen->id}}" action="{{route('hapus.komen', $komen->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="customConfirm('Hapus komentar ini?', () => document.getElementById('deleteForm{{$komen->id}}').submit())" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @endif
                                            @if(session('user')['role'] == 'admin')
                                                <!-- Admin hanya bisa Hapus komentar orang lain, tidak bisa Edit -->
                                                @if(session('user')['id'] != $komen->warga_id)
                                                    <form id="deleteForm{{$komen->id}}" action="{{route('hapus.komen', $komen->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="customConfirm('Hapus komentar ini?', () => document.getElementById('deleteForm{{$komen->id}}').submit())" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            
                                            @if (session('user')['role'] != 'admin' && session('user')['id'] != $komen->warga_id)
                                                @if (!$komen->lapor)
                                                    <form id="reportForm{{$komen->id}}" action="{{route('report.komen', $komen->id)}}" method="POST">
                                                        @csrf
                                                        <button type="button" onclick="customConfirm('Laporkan komentar ini?', () => document.getElementById('reportForm{{$komen->id}}').submit())" 
                                                            class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                            Report
                                                        </button>
                                                    </form>                                                    
                                                @else
                                                    <span class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                                        Direport
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>                                                           
                                </div>
                                @endif
                            </div>                                                        
                            <p id="komen-text-{{$komen->id}}" class="mt-2 text-gray-800">{{$komen->komen}}</p>
                            <form id="edit-form-{{$komen->id}}" action="{{route('edit.komen', $komen->id)}}" method="POST" class="hidden mt-2">
                                @csrf
                                <textarea name="komen" rows="2" class="w-full border border-gray-300 rounded-lg p-2 text-sm">{{$komen->komen}}</textarea>
                                <div class="flex justify-end gap-2 mt-2">
                                    <button type="button" onclick="cancelEdit({{$komen->id}})" class="bg-gray-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-gray-700">Batal</button>
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-700">Simpan</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="relative mt-8">
                    @if (@session('user'))
                        <form action="{{route('post.komen', $materi->id) }}" method="POST">
                            @csrf
                            <!-- Textarea -->
                            <textarea name="komen" id="messageInput" placeholder="Tulis pesan..." rows="3"
                                class="flex-1 w-full rounded-2xl border border-gray-200 px-5 py-3 pr-1 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 shadow-sm focus:shadow-md resize-none overflow-y-auto"></textarea>
                            
                            <!-- Send Button -->
                            <button type="submit"
                                class="absolute top-1/2 right-3 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-md transition-all duration-300 flex items-center justify-center">
                                <i class="bi bi-send text-lg leading-none"></i>
                            </button>
                        </form>                    
                    @else
                        <p><a href="{{ route('login') }}">Login terlebih dahulu untuk berkomentar</a></p>                        
                    @endif                    
                </div>
            </div>
        </div>
    </div>
    {{-- Confirm alert --}}
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

        // Dropdown three dots vertical
        document.querySelectorAll('.menu-button').forEach(button => {
            button.addEventListener('click', (e) => {
                const dropdown = button.nextElementSibling;
                dropdown.classList.toggle('hidden');
            });
        });

        // Close dropdown
        document.addEventListener('click', (e) => {
            document.querySelectorAll('.menu-dropdown').forEach(dropdown => {
                if (!dropdown.contains(e.target) && !dropdown.previousElementSibling.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });

        // Delete
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

        // Edit 
        function showEditForm(id, oldText) {
        const text = document.getElementById('komen-text-' + id);
        const form = document.getElementById('edit-form-' + id);
        text.classList.add('hidden');
        form.classList.remove('hidden');
        }

        function cancelEdit(id) {
            const text = document.getElementById('komen-text-' + id);
            const form = document.getElementById('edit-form-' + id);
            text.classList.remove('hidden');
            form.classList.add('hidden');
        }

    </script>
    
</body>
</html>