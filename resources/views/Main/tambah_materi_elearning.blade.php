<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
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
                    class="block text-gray-800 font-medium py-3 px-4 rounded-lg bg-gray-200 hover:bg-gray-300 transition-colors">
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
                    class="text-gray-800 font-medium py-2 border-b-2 border-transparent hover:text-blue-600 hover:border-blue-600 transition-colors whitespace-nowrap">
                    Kelola Materi
                </a>
                <a href="/uploadMateri"
                    class="text-gray-800 font-medium py-2 border-b-2 border-gray-800 hover:text-blue-600 transition-colors whitespace-nowrap">
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

            <!-- Upload Materi Section -->
            <div class="bg-white rounded-xl p-6 sm:p-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 text-center mb-6">UPLOAD MATERI</h2>

                <form action="{{route('tambahMateri')}}" method="POST" enctype="multipart/form-data">
                    @csrf 

                    {{-- input judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-medium mb-2">Judul</label>
                        <input type="text" id="judul" name="judul" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" required>                        
                        @error('judul') <div class="text-danger error-message">{{$message}}</div>@enderror
                    </div>

                    {{-- input Deskripsi --}}
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                        <input type="text" id="deskripsi" name="deskripsi" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500" required>
                        @error('deskripsi') <div class="text-danger error-message">{{$message}}</div>@enderror
                    </div>
                
                    <!-- File Upload Area -->
                    <div id="uploadArea"
                        class="border-2 border-dashed border-gray-400 rounded-xl p-8 sm:p-12 text-center transition-all duration-300 hover:border-blue-500 hover:bg-blue-50 cursor-pointer mb-6">
                        <div id="uploadContent">
                            <!-- Upload Icon -->
                            <div class="mb-4">
                                <div
                                    class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-300 rounded-full flex items-center justify-center mx-auto">
                                    <i class="bi bi-download text-2xl sm:text-3xl text-gray-600"></i>
                                </div>
                            </div>

                            <!-- Upload Text -->
                            <p class="text-gray-600 text-sm sm:text-base mb-2">Seret File ke sini</p>
                            <p class="text-gray-500 text-xs sm:text-sm">atau klik untuk memilih file PDF</p>
                        </div>

                        <!-- File Selected State (Hidden by default) -->
                        <div id="fileSelected" class="hidden">
                            <div class="flex items-center justify-center space-x-3 mb-4">
                                <i class="bi bi-file-earmark-plus text-blue-500 text-3xl sm:text-4xl"></i>
                                <div class="text-left">
                                    <p id="selectedCount" class="font-medium text-gray-800 text-sm sm:text-base"></p>
                                    <p class="text-gray-500 text-xs sm:text-sm">Klik atau seret untuk menambah file</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden File Input -->
                    <input type="file" id="fileInput" name="materi" accept=".pdf" class="hidden" required>

                    <!-- Uploaded Files List -->
                    <div id="filesList" class="mb-6 max-h-64 overflow-y-auto hidden">
                        <h3 class="text-lg font-medium text-gray-800 mb-3">File yang akan diupload:</h3>
                        <div id="fileListContainer" class="space-y-2"></div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <button type="submit" id="simpanBtn"
                            class="flex-1 bg-blue-500 text-white py-3 px-6 rounded-lg font-medium hover:bg-blue-600 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed"
                            disabled>
                            Simpan Perubahan
                        </button>
                        <button type="button" id="batalBtn"
                            class="flex-1 sm:flex-initial bg-gray-300 text-gray-700 py-3 px-6 rounded-lg font-medium hover:bg-gray-400 transition-colors">
                            Batal
                        </button>
                    </div>
                </form>
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

        // File upload functionality
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const uploadContent = document.getElementById('uploadContent');
        const fileSelected = document.getElementById('fileSelected');
        const selectedCount = document.getElementById('selectedCount');
        const filesList = document.getElementById('filesList');
        const fileListContainer = document.getElementById('fileListContainer');
        const simpanBtn = document.getElementById('simpanBtn');
        const batalBtn = document.getElementById('batalBtn');

        let selectedFiles = [];

        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Create file item element
        function createFileItem(file, index) {
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item flex items-center justify-between bg-gray-100 p-3 rounded-lg';
            fileItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="bi bi-file-earmark-pdf text-red-500 text-xl"></i>
                    <div>
                        <p class="font-medium text-gray-800 text-sm">${file.name}</p>
                        <p class="text-gray-500 text-xs">${formatFileSize(file.size)}</p>
                    </div>
                </div>
                <button type="button" class="remove-file text-red-500 hover:text-red-700" data-index="${index}">
                    <i class="bi bi-x-circle"></i>
                </button>
            `;
            return fileItem;
        }

        // Update files list display
        function updateFilesList() {
            fileListContainer.innerHTML = '';

            if (selectedFiles.length > 0) {
                selectedFiles.forEach((file, index) => {
                    const fileItem = createFileItem(file, index);
                    fileListContainer.appendChild(fileItem);
                });

                filesList.classList.remove('hidden');

                // Add event listeners to remove buttons
                document.querySelectorAll('.remove-file').forEach(button => {
                    button.addEventListener('click', function () {
                        const index = parseInt(this.getAttribute('data-index'));
                        removeFile(index);
                    });
                });
            } else {
                filesList.classList.add('hidden');
            }
        }

        // Remove file from selection
        function removeFile(index) {
            selectedFiles.splice(index, 1);
            updateFilesDisplay();
        }

        // Handle file selection
        function handleFileSelect(files) {
            const file = files[0];

            if (file && file.type === 'application/pdf') {
                // Add new files to the selection
                selectedFiles = [file];
                updateFilesDisplay();
                                
                const fileName  = file.name.replace(/\.[^/.]+$/, "");
                const judulInput = document.getElementById('judul');
                if (judulInput){
                    judulInput.value = fileName;
                }
                simpanBtn.disabled = false
            } else {
                alert('Silakan pilih file PDF yang valid.');
            }
        }

        // Update files display
        function updateFilesDisplay() {
            if (selectedFiles.length > 0) {
                selectedCount.textContent = `${selectedFiles.length} file PDF dipilih`;
                uploadContent.classList.add('hidden');
                fileSelected.classList.remove('hidden');
                uploadArea.classList.add('border-blue-500', 'bg-blue-50');
                simpanBtn.disabled = false;

                updateFilesList();
            } else {
                resetUpload();
            }
        }

        // Reset upload area
        function resetUpload() {
            selectedFiles = [];
            uploadContent.classList.remove('hidden');
            fileSelected.classList.add('hidden');
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
            filesList.classList.add('hidden');
            simpanBtn.disabled = true;
            fileInput.value = '';
        }

        // Click to upload
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // File input change
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFileSelect(e.target.files);
            }
        });

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-blue-500', 'bg-blue-100');
        });

        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            if (selectedFiles.length === 0) {
                uploadArea.classList.remove('border-blue-500', 'bg-blue-100');
            }
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-blue-500', 'bg-blue-100');

            if (e.dataTransfer.files.length > 0) {
                handleFileSelect(e.dataTransfer.files);
            }
        });

        // Button handlers
        simpanBtn.addEventListener('click', (e) => {
            if (selectedFiles.length === 0) {
                e.preventDefault();
                alert('silahkan pilih file materi pdf terlebih dahulu')
                // const fileNames = selectedFiles.map(file => file.name).join(', ');
                // alert(`${selectedFiles.length} file berhasil diupload: ${fileNames}`);
                // Here you would typically upload the files to your server
                // resetUpload();
            } 
        });

        batalBtn.addEventListener('click', () => {
            resetUpload();
        });
    </script>

    {{-- Error --}}
    @if ($errors->any())
        <div id="toastError"
            class="fixed top-5 left-1/2 -translate-x-1/2 bg-red-600 text-white py-3 px-6 rounded-lg shadow-lg opacity-0 transition-opacity duration-500 z-50">
            {{ $errors->first() }}
        </div>

        <script>
            const toastErr = document.getElementById('toastError');
            toastErr.style.opacity = 1;

            setTimeout(() => {
                toastErr.style.opacity = 0;
            }, 1500);
        </script>
    @endif


    {{-- Success --}}
    @if (session('success'))
        <div id="toastSuccess"
            class="fixed top-5 left-1/2 -translate-x-1/2 bg-green-600 text-white py-3 px-6 rounded-lg shadow-lg opacity-0 transition-opacity duration-500 z-50">
            {{ session('success') }}
        </div>

        <script>
            const toast = document.getElementById('toastSuccess');
            toast.style.opacity = 1;

            setTimeout(() => {
                toast.style.opacity = 0;
            }, 1500);
        </script>
    @endif


</body>

</html>