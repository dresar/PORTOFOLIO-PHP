<!DOCTYPE html>
{{-- Tambahkan x-data dan :class untuk dark mode --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Portfolio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    {{-- Vite akan memasukkan CSS dan JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Style inline untuk mencegah FOUC (Flash of Unstyled Content) dark mode --}}
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        /* Style tambahan jika diperlukan, tapi usahakan pakai Tailwind */
        /* Animasi halus */
        .transition-smooth { transition: all 0.3s ease-in-out; }
        /* Styling dasar untuk scrollbar (opsional) */
        .dark ::-webkit-scrollbar { width: 8px; }
        .dark ::-webkit-scrollbar-track { background: #1f2937; } /* dark:bg-gray-800 */
        .dark ::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; } /* dark:bg-gray-700 */
        .dark ::-webkit-scrollbar-thumb:hover { background: #4b5563; } /* dark:bg-gray-600 */
    </style>
</head>
{{-- Aplikasikan warna latar belakang dasar dan warna teks --}}
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
            <nav class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                {{-- Ganti dengan logo atau nama Anda --}}
                <a href="{{ route('portfolio.index') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">
                    Nama Anda / Logo
                </a>

                {{-- Tombol Toggle Dark Mode --}}
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                        class="p-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 transition-smooth">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="sr-only">Toggle dark mode</span>
                </button>
            </nav>
        </header>

        <!-- Konten Utama -->
        <main class="flex-grow">
            @yield('content') {{-- Konten spesifik halaman akan masuk di sini --}}
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 py-6 mt-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-400 text-sm">
                © {{ date('Y') }} Nama Anda. All Rights Reserved.
            </div>
        </footer>

    </div> {{-- Akhir min-h-screen --}}

    {{-- Tempatkan script modal jika ada (seperti contoh sebelumnya) di sini atau di yield content --}}
    @stack('modals')
    @stack('scripts')
</body>
</html>
{{-- Catatan: Pastikan untuk menyesuaikan nama dan logo sesuai dengan kebutuhan Anda --}}
{{-- Anda juga bisa menambahkan lebih banyak komponen atau fitur sesuai kebutuhan --}}
{{-- Misalnya, menambahkan menu navigasi, breadcrumb, dll. --}}
{{-- Gunakan Tailwind CSS untuk styling yang responsif dan modern --}}