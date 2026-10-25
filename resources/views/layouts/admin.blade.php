<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle ?? 'Admin' }} — {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="flex h-screen overflow-hidden">

    <!-- ═══════════════ SIDEBAR ═══════════════ -->
    <aside class="w-64 flex-shrink-0 bg-gradient-to-b from-forest-900 via-forest-800 to-forest-900 flex flex-col">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/10">
            <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center shadow">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-sm leading-tight" style="font-family:'Playfair Display',serif">Sikatan London</p>
                <p class="text-white/50 text-xs">Admin Panel</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">

            <p class="text-white/30 text-xs font-semibold uppercase tracking-widest px-4 mb-2">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            <p class="text-white/30 text-xs font-semibold uppercase tracking-widest px-4 mt-5 mb-2">Kelola Konten</p>

            <a href="{{ route('admin.hero.edit') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Hero Section
            </a>

            <a href="{{ route('admin.contents.index') }}" class="sidebar-link {{ request()->routeIs('admin.contents.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Tips & Konten
            </a>

            <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Galeri Foto
            </a>

            <p class="text-white/30 text-xs font-semibold uppercase tracking-widest px-4 mt-5 mb-2">Pengaturan</p>

            <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Pengaturan Situs
            </a>
        </nav>

        <!-- User info + logout -->
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full bg-amber-500/30 flex items-center justify-center text-amber-400 font-bold text-sm">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                    <p class="text-white/40 text-xs truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('home') }}" class="flex-1 text-center text-xs py-2 px-3 rounded-lg bg-white/10 text-white/70 hover:bg-white/20 hover:text-white transition-all duration-200">
                    Lihat Situs
                </a>
                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full text-xs py-2 px-3 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500/30 hover:text-red-300 transition-all duration-200">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ═══════════════ MAIN AREA ═══════════════ -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Topbar -->
        <header class="h-14 bg-white border-b border-gray-200 flex items-center justify-between px-6 flex-shrink-0">
            <div>
                <h1 class="text-base font-semibold text-gray-800">{{ $pageTitle ?? 'Dashboard' }}</h1>
                @isset($breadcrumb)
                    <p class="text-xs text-gray-400">{{ $breadcrumb }}</p>
                @endisset
            </div>
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-1 rounded-full bg-forest-100 text-forest-700 text-xs font-semibold">Admin</span>
                <span class="text-xs text-gray-400">{{ now()->format('d M Y') }}</span>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success') || session('error') || $errors->any())
            <div class="mx-6 mt-4">
                @if(session('success'))
                    <div class="alert-success flash-message">
                        <svg class="w-5 h-5 text-forest-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert-error flash-message">
                        <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert-error flash-message">
                        <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <ul class="text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            {{ $slot }}
        </main>
    </div>
</div>

</body>
</html>
