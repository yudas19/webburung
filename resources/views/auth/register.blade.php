<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">

<div class="min-h-screen grid lg:grid-cols-2">

    {{-- Left Panel - Visual --}}
    <div class="hidden lg:flex relative bg-forest-900 flex-col justify-between p-12 overflow-hidden">
        {{-- Background --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1444464666168-49d633b86797?auto=format&fit=crop&w=1200&q=80"
                 alt="Sikatan London" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-br from-forest-900/95 via-forest-800/80 to-earth-800/70"></div>
        </div>

        {{-- Top --}}
        <div class="relative z-10">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white" style="font-family:'Playfair Display',serif">Sikatan London</span>
            </a>
        </div>

        {{-- Middle content --}}
        <div class="relative z-10">
            <h1 class="text-4xl font-bold text-white mb-4 leading-tight" style="font-family:'Playfair Display',serif">
                Bergabung Bersama<br>Komunitas Kami
            </h1>
            <p class="text-white/70 text-lg leading-relaxed mb-8">
                Daftarkan diri Anda dan nikmati akses ke panduan lengkap, galeri foto, dan diskusi komunitas peternak Sikatan London.
            </p>
            <div class="space-y-3">
                @foreach(['Akses panduan beternak lengkap','Bergabung dengan diskusi komunitas','Update tips terbaru dari para ahli'] as $feat)
                    <div class="flex items-center gap-3 text-white/80">
                        <div class="w-6 h-6 rounded-full bg-amber-500/30 border border-amber-500/50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-sm">{{ $feat }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Bottom --}}
        <div class="relative z-10">
            <p class="text-white/30 text-xs">&copy; {{ date('Y') }} Komunitas Sikatan London Indonesia</p>
        </div>
    </div>

    {{-- Right Panel - Register Form --}}
    <div class="flex items-center justify-center p-8 bg-white">
        <div class="w-full max-w-md">

            {{-- Mobile logo --}}
            <div class="lg:hidden flex items-center gap-3 mb-8">
                <div class="w-9 h-9 rounded-xl bg-forest-700 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                    </svg>
                </div>
                <span class="text-lg font-bold text-forest-800" style="font-family:'Playfair Display',serif">Sikatan London</span>
            </div>

            <h2 class="text-3xl font-bold text-gray-800 mb-2" style="font-family:'Playfair Display',serif">Buat Akun Baru</h2>
            <p class="text-gray-500 text-sm mb-8">Isi formulir di bawah untuk bergabung dengan komunitas kami</p>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert-error mb-5">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <ul class="text-sm list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="form-label-sikatan">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                           value="{{ old('name') }}"
                           class="form-input-sikatan"
                           placeholder="Nama Anda"
                           required autofocus autocomplete="name">
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label-sikatan">Alamat Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           class="form-input-sikatan"
                           placeholder="nama@example.com"
                           required autocomplete="username">
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="form-label-sikatan">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                           class="form-input-sikatan"
                           placeholder="Minimal 8 karakter"
                           required autocomplete="new-password">
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="form-label-sikatan">Konfirmasi Kata Sandi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-input-sikatan"
                           placeholder="Ulangi kata sandi"
                           required autocomplete="new-password">
                </div>

                {{-- Submit --}}
                <button type="submit" id="btn-register" class="btn-primary-sikatan w-full justify-center py-3 text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    Daftar Sekarang
                </button>

            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-forest-600 hover:text-forest-700 font-medium transition-colors">
                    Masuk di sini
                </a>
            </p>

            <p class="text-center text-sm text-gray-400 mt-3">
                <a href="{{ route('home') }}" class="text-forest-600 hover:text-forest-700 font-medium transition-colors">
                    ← Kembali ke beranda
                </a>
            </p>

        </div>
    </div>

</div>

</body>
</html>
