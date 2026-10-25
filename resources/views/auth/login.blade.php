<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — {{ config('app.name') }}</title>
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
                Selamat Datang di<br>Komunitas Peternak
            </h1>
            <p class="text-white/70 text-lg leading-relaxed mb-8">
                Bergabunglah dengan komunitas pecinta burung Sikatan London <em>(Cyornis tickelliae)</em> terbesar di Indonesia.
            </p>

            {{-- Features --}}
            <div class="space-y-3">
                @foreach(['Panduan lengkap beternak dari para ahli','Galeri foto koleksi eksklusif','Komunitas diskusi peternak aktif'] as $feat)
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

    {{-- Right Panel - Login Form --}}
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

            <h2 class="text-3xl font-bold text-gray-800 mb-2" style="font-family:'Playfair Display',serif">Masuk ke Akun</h2>
            <p class="text-gray-500 text-sm mb-8">Masukkan email dan kata sandi Anda untuk melanjutkan</p>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert-success mb-5">
                    <svg class="w-5 h-5 text-forest-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-sm">{{ session('status') }}</p>
                </div>
            @endif

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

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label-sikatan">Alamat Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}"
                           class="form-input-sikatan"
                           placeholder="nama@example.com"
                           autocomplete="username" required autofocus>
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="form-label-sikatan mb-0">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs text-forest-600 hover:text-forest-700 font-medium transition-colors">
                                Lupa kata sandi?
                            </a>
                        @endif
                    </div>
                    <input type="password" id="password" name="password"
                           class="form-input-sikatan"
                           placeholder="••••••••"
                           autocomplete="current-password" required>
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember_me" name="remember"
                           class="w-4 h-4 rounded border-gray-300 text-forest-600 focus:ring-forest-500 cursor-pointer">
                    <label for="remember_me" class="text-sm text-gray-600 cursor-pointer select-none">Ingat saya</label>
                </div>

                {{-- Submit --}}
                <button type="submit" id="btn-login" class="btn-primary-sikatan w-full justify-center py-3 text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Masuk ke Akun
                </button>

            </form>

            {{-- Demo credentials --}}
            <div class="mt-6 p-4 rounded-xl bg-gray-50 border border-gray-200">
                <p class="text-xs font-semibold text-gray-600 mb-2">🔑 Akun Demo:</p>
                <div class="space-y-1">
                    <p class="text-xs text-gray-500"><strong>Admin:</strong> admin@sikatan.test / password</p>
                    <p class="text-xs text-gray-500"><strong>User:</strong> user@sikatan.test / password</p>
                </div>
            </div>

            <p class="text-center text-sm text-gray-400 mt-6">
                <a href="{{ route('home') }}" class="text-forest-600 hover:text-forest-700 font-medium transition-colors">
                    ← Kembali ke halaman beranda
                </a>
            </p>

        </div>
    </div>

</div>

</body>
</html>
