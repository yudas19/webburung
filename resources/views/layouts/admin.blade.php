<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Admin' }} — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f0f2f5] font-sans antialiased">

<div class="flex h-screen overflow-hidden">

    <!-- ═══════════ SIDEBAR ═══════════ -->
    <aside class="w-64 flex-shrink-0 flex flex-col overflow-hidden"
           style="background: linear-gradient(170deg, #0c1f10 0%, #193521 40%, #1e4020 70%, #255128 100%)">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-5 py-5 border-b border-white/10">
            <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center shadow-lg shadow-amber-500/30 shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-sm leading-tight" style="font-family:'Playfair Display',serif">Sikatan London</p>
                <p class="text-white/40 text-xs">Admin Dashboard</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-5 space-y-0.5 overflow-y-auto">

            <p class="text-white/25 text-[10px] font-bold uppercase tracking-[0.15em] px-4 mb-2">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
                @if(request()->routeIs('admin.dashboard'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                @endif
            </a>

            <p class="text-white/25 text-[10px] font-bold uppercase tracking-[0.15em] px-4 mt-5 mb-2">Kelola Konten</p>

            <a href="{{ route('admin.hero.edit') }}"
               class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Hero Section</span>
                @if(request()->routeIs('admin.hero.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                @endif
            </a>

            <a href="{{ route('admin.contents.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.contents.*') ? 'active' : '' }}">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Tips & Konten</span>
                @if(request()->routeIs('admin.contents.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                @endif
            </a>

            <a href="{{ route('admin.galleries.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Galeri Foto</span>
                @if(request()->routeIs('admin.galleries.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                @endif
            </a>

            <p class="text-white/25 text-[10px] font-bold uppercase tracking-[0.15em] px-4 mt-5 mb-2">Konfigurasi</p>

            <a href="{{ route('admin.settings.edit') }}"
               class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Pengaturan Situs</span>
                @if(request()->routeIs('admin.settings.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                @endif
            </a>

        </nav>

        <!-- User info -->
        <div class="p-3 border-t border-white/10">
            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition-colors duration-200 mb-2">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-sm shrink-0 shadow-md">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-white text-sm font-semibold truncate leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-white/40 text-xs truncate">Administrator</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center justify-center gap-1.5 text-xs py-2 px-3 rounded-xl bg-white/8 text-white/60 hover:bg-white/15 hover:text-white transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Situs
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center justify-center gap-1.5 text-xs py-2 px-3 rounded-xl bg-red-500/15 text-red-400 hover:bg-red-500/25 hover:text-red-300 transition-all duration-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ═══════════ MAIN AREA ═══════════ -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Topbar -->
        <header class="h-14 bg-white border-b border-gray-200/80 flex items-center justify-between px-6 shrink-0 shadow-sm">
            <div>
                <h1 class="text-base font-bold text-gray-800">{{ $pageTitle ?? 'Dashboard' }}</h1>
                @isset($breadcrumb)
                    <p class="text-xs text-gray-400 leading-none mt-0.5">{{ $breadcrumb }}</p>
                @endisset
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-forest-50 border border-forest-100">
                    <span class="w-2 h-2 rounded-full bg-forest-500"></span>
                    <span class="text-xs font-semibold text-forest-700">Admin</span>
                </div>
                <span class="text-xs text-gray-400">{{ now()->isoFormat('D MMM Y') }}</span>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success') || session('error') || $errors->any())
            <div class="px-6 pt-4">
                @if(session('success'))
                    <div class="alert-success flash-message shadow-sm">
                        <svg class="w-5 h-5 text-forest-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert-error flash-message shadow-sm">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium">{{ session('error') }}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert-error flash-message shadow-sm">
                        <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <ul class="text-sm space-y-0.5">
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
