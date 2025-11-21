<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-gray-400 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 sm:p-10">
        <div class="text-center mb-8 sm:mb-10">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Form Register</h1>
        </div>
        <form class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            {{-- jika berhasil tampilkan alert --}}
            @if (session('success'))
            <div 
                id="successToast"
                class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-xl shadow-lg transition-all duration-300">
                {{ session('success') }}
            </div>
            <script>
                // Auto-hide setelah 3 detik
                const toast = document.getElementById('successToast');
                if(toast) {
                    setTimeout(() => {
                        toast.classList.add('opacity-0', '-translate-y-4'); // animasi hilang
                        setTimeout(() => toast.remove(), 500); // hapus elemen
                    }, 3000);
                }
            </script>
            @endif
            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded-lg text-sm mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-person-fill text-gray-400 text-lg"></i>
                </div>
                <input type="text" id="nama" name="nama" required
                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Username" />
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-envelope text-gray-400 text-lg"></i>
                </div>
                <input type="email" id="email" name="email" required
                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Email Address" />
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="bi bi-lock-fill text-gray-400 text-lg"></i>
                </div>
                <input type="password" id="password" name="password" required
                    class="w-full pl-12 pr-12 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                    placeholder="Password" />
                <button type="button" id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="bi bi-eye text-lg" id="eyeIcon"></i>
                </button>
            </div>
            <div class="text-center">
                <a href="{{route('login')}}" class="text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                    Sudah Punya Akun ?
                </a>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-4 rounded-xl transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg hover:shadow-xl">
                Register
            </button>
        </form>
    </div>
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            if (type === 'password') {
                eyeIcon.className = 'bi bi-eye text-lg';
            } else {
                eyeIcon.className = 'bi bi-eye-slash text-lg';
            }
        });
        var toastEl = document.querySelector('.toast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    </script>
</body>
</html>