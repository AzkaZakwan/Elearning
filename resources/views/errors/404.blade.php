<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>404 - Not Found</title>
</head>
<body class="bg-gray-50 dark:bg-white-900">
<section class="min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-7xl font-bold text-blue-600">404</h1>
        <p class="mt-4 text-xl text-gray-700 dark:text-black-300">Halaman tidak ditemukan</p>
        <a href="{{ url('/') }}" 
           class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Kembali ke Beranda
        </a>
    </div>
</section>
</body>
</html>
