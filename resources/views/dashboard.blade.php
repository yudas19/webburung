<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

<div class="min-h-screen">
    {{-- Header --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-9 h-9 rounded-xl bg-forest-700 flex items-center justify-center shadow-sm group-hover:bg-forest-600 transition-colors duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-forest-800" style="font-family:'Playfair Display',serif">Sikatan London</span>
                </a>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Halo, <strong>{{ auth()->user()->name }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn-secondary-sikatan text-sm py-2 px-4">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    {{-- Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- Welcome Banner --}}
        <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-forest-700 via-forest-600 to-earth-600 p-8 lg:p-12 mb-8 shadow-xl">
            <div class="absolute inset-0 opacity-10">
                <svg viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                    <circle cx="350" cy="50" r="120" fill="white"/>
                    <circle cx="50" cy="250" r="80" fill="white"/>
                </svg>
            </div>
            <div class="relative z-10">
                <p class="text-white/70 text-sm font-medium mb-1">Selamat datang kembali</p>
                <h1 class="text-3xl lg:text-4xl font-bold text-white mb-3" style="font-family:'Playfair Display',serif">
                    {{ auth()->user()->name }} 🎉
                </h1>
                <p class="text-white/80 text-lg mb-6">Anda terdaftar sebagai anggota komunitas peternak burung Sikatan London.</p>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-forest-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Kunjungi Beranda
                </a>
            </div>
        </div>

        {{-- Quick Links --}}
        <div class="grid sm:grid-cols-3 gap-6">
            <a href="{{ route('home') }}#panduan" class="card-sikatan p-6 group">
                <div class="w-12 h-12 rounded-xl bg-forest-100 flex items-center justify-center mb-4 group-hover:bg-forest-200 transition-colors duration-200">
                    <svg class="w-6 h-6 text-forest-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.75 19 7.5 19s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 19 16.5 19c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-1" style="font-family:'Playfair Display',serif">Tips & Panduan</h3>
                <p class="text-sm text-gray-500">Baca panduan lengkap beternak Sikatan London</p>
            </a>

            <a href="{{ route('home') }}#galeri" class="card-sikatan p-6 group">
                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4 group-hover:bg-amber-200 transition-colors duration-200">
                    <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-1" style="font-family:'Playfair Display',serif">Galeri Foto</h3>
                <p class="text-sm text-gray-500">Lihat koleksi foto burung Sikatan London</p>
            </a>

            <a href="{{ route('profile.edit') }}" class="card-sikatan p-6 group">
                <div class="w-12 h-12 rounded-xl bg-earth-100 flex items-center justify-center mb-4 group-hover:bg-earth-200 transition-colors duration-200">
                    <svg class="w-6 h-6 text-earth-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-1" style="font-family:'Playfair Display',serif">Profil Saya</h3>
                <p class="text-sm text-gray-500">Kelola informasi akun Anda</p>
            </a>
        </div>

    </main>
</div>

</body>
</html>
