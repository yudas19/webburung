<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? 'Komunitas edukasi dan peternak burung Sikatan London (Cyornis tickelliae) terpercaya di Indonesia.' }}">

    <title>{{ $pageTitle ?? config('app.name') }}</title>

    <!-- Preconnect fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans antialiased">

    <!-- ═══════════════ NAVBAR ═══════════════ -->
    <header id="public-header" class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm transition-all duration-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-forest-700 flex items-center justify-center shadow-sm group-hover:bg-forest-600 transition-colors duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                        </svg>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-lg font-bold text-forest-800" style="font-family:'Playfair Display',serif">Sikatan London</span>
                        <p class="text-xs text-earth-500 -mt-0.5">Komunitas & Edukasi</p>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="nav-link-public py-2">Beranda</a>
                    <a href="{{ route('home') }}#tentang" class="nav-link-public py-2">Tentang</a>
                    <a href="{{ route('home') }}#panduan" class="nav-link-public py-2">Panduan</a>
                    <a href="{{ route('home') }}#galeri" class="nav-link-public py-2">Galeri</a>
                    <a href="{{ route('home') }}#kontak" class="nav-link-public py-2">Kontak</a>
                </div>

                <!-- Auth buttons -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary-sikatan text-sm py-2 px-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                                Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-secondary-sikatan text-sm py-2 px-4">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-secondary-sikatan text-sm py-2 px-4">Masuk</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-toggle" class="md:hidden p-2 rounded-lg text-forest-700 hover:bg-forest-50 transition-colors duration-200">
                    <svg class="w-6 h-6 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>
        </nav>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white">
            <div class="px-4 py-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-lg text-forest-800 font-medium hover:bg-forest-50 transition-colors duration-200">Beranda</a>
                <a href="{{ route('home') }}#tentang" class="block px-4 py-2.5 rounded-lg text-forest-800 font-medium hover:bg-forest-50 transition-colors duration-200">Tentang</a>
                <a href="{{ route('home') }}#panduan" class="block px-4 py-2.5 rounded-lg text-forest-800 font-medium hover:bg-forest-50 transition-colors duration-200">Panduan</a>
                <a href="{{ route('home') }}#galeri" class="block px-4 py-2.5 rounded-lg text-forest-800 font-medium hover:bg-forest-50 transition-colors duration-200">Galeri</a>
                <a href="{{ route('home') }}#kontak" class="block px-4 py-2.5 rounded-lg text-forest-800 font-medium hover:bg-forest-50 transition-colors duration-200">Kontak</a>
                <div class="pt-2 border-t border-gray-100 flex flex-col gap-2">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary-sikatan justify-center">Dashboard Admin</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-secondary-sikatan w-full justify-center">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary-sikatan justify-center">Masuk</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    @if(session('success') || session('error'))
        <div class="fixed top-20 right-4 z-50 max-w-sm flash-message">
            @if(session('success'))
                <div class="alert-success shadow-lg">
                    <svg class="w-5 h-5 text-forest-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="alert-error shadow-lg">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif
        </div>
    @endif

    <!-- Page Content -->
    <main class="pt-16 lg:pt-20">
        {{ $slot }}
    </main>

    <!-- Gallery Lightbox -->
    <div id="gallery-lightbox" class="hidden fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4" role="dialog" aria-modal="true">
        <button id="lightbox-close" class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors p-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div class="max-w-4xl w-full">
            <img id="lightbox-img" src="" alt="Gallery" class="w-full max-h-[80vh] object-contain rounded-xl">
            <p id="lightbox-caption" class="text-center text-white/80 mt-4 text-sm"></p>
        </div>
    </div>

</body>
</html>
