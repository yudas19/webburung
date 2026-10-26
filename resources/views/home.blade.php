<x-layouts.public :pageTitle="config('app.name') . ' — Komunitas & Edukasi Burung Sikatan London'">


{{-- ═══════════════════════ HERO SECTION ═══════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden" id="beranda">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        @if($hero->image_path)
            <img src="{{ $hero->image_path }}"
                 alt="Burung Sikatan London"
                 class="w-full h-full object-cover"
                 loading="eager">
        @endif
        <div class="absolute inset-0 bg-hero-overlay"></div>

        {{-- Animated blobs --}}
        <div class="absolute top-1/4 right-10 w-80 h-80 bg-amber-500/15 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-forest-400/10 rounded-full blur-3xl animate-blob" style="animation-delay:3s"></div>

        {{-- Grid pattern overlay --}}
        <div class="absolute inset-0 opacity-5" style="background-image:linear-gradient(rgba(255,255,255,.1) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.1) 1px,transparent 1px);background-size:60px 60px"></div>
    </div>

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-0 w-full">
        <div class="max-w-3xl">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card text-white/90 text-sm font-medium mb-8 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-amber-400 pulse-glow"></span>
                <span>Komunitas Peternak Burung Indonesia</span>
                <span class="w-px h-4 bg-white/20"></span>
                <span class="text-amber-300">✦ Aktif & Terpercaya</span>
            </div>

            {{-- Main title --}}
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-[1.1] mb-6 animate-fade-in-up animate-delay-100"
                style="font-family:'Playfair Display',serif; text-shadow:0 2px 20px rgba(0,0,0,0.3)">
                {!! $hero->title !!}
            </h1>

            {{-- Subtitle --}}
            <p class="text-xl text-white/80 leading-relaxed mb-10 max-w-2xl animate-fade-in-up animate-delay-200">
                {!! $hero->subtitle !!}
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-4 animate-fade-in-up animate-delay-300">
                <a href="{{ $hero->cta_link ?? '#panduan' }}" class="btn-amber text-base px-8 py-4 shadow-xl shadow-amber-600/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.75 19 7.5 19s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 19 16.5 19c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    {{ $hero->cta_text ?? 'Jelajahi Panduan' }}
                </a>
                <a href="{{ route('home') }}#galeri" class="btn-outline-white text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Lihat Galeri
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-16 flex flex-wrap gap-0 animate-fade-in-up animate-delay-400">
                @foreach([
                    ['500+', 'Anggota Aktif'],
                    [$tips->count() . '+', 'Panduan Beternak'],
                    [$galleries->count() . '+', 'Foto Koleksi'],
                ] as $i => [$num, $label])
                    <div class="px-8 py-4 {{ $i > 0 ? 'border-l border-white/20' : '' }} text-center">
                        <p class="text-3xl lg:text-4xl font-bold text-amber-400 mb-1" style="font-family:'Playfair Display',serif">{{ $num }}</p>
                        <p class="text-white/60 text-xs uppercase tracking-widest font-medium">{{ $label }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Decorative bird silhouette --}}
    <div class="absolute bottom-0 right-0 w-1/2 h-full pointer-events-none hidden lg:flex items-end justify-end opacity-8">
        <svg viewBox="0 0 400 300" fill="none" class="w-80 opacity-10">
            <path d="M200 280 C150 220 80 180 40 120 C80 140 130 150 180 140 C160 100 170 60 200 40 C230 60 240 100 220 140 C270 150 320 140 360 120 C320 180 250 220 200 280Z" fill="white"/>
        </svg>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40 animate-bounce">
        <span class="text-xs tracking-widest uppercase font-medium">Gulir</span>
        <div class="w-px h-8 bg-gradient-to-b from-white/40 to-transparent"></div>
    </div>

</section>


{{-- ═══════════════════════ TENTANG SECTION ═══════════════════════ --}}
<section id="tentang" class="py-24 lg:py-32 bg-white relative overflow-hidden">

    {{-- Background decoration --}}
    <div class="absolute inset-0 bg-section-pattern opacity-40 pointer-events-none"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-forest-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16" data-animate>
            <span class="section-label">Pengenalan Spesies</span>
            <h2 class="section-title">Mengenal Burung<br><em class="text-gradient not-italic">Sikatan London</em></h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle max-w-2xl mx-auto">
                <em class="text-forest-600 not-italic font-medium">Cyornis tickelliae</em> — Salah satu burung kicauan paling eksotis dan dicari di Asia Tenggara
            </p>
        </div>

        @if($about)
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Image --}}
                @if($about->image_path)
                    <div class="relative" data-animate>
                        {{-- Main image --}}
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-forest-900/20">
                            <img src="{{ $about->image_path }}" alt="{{ $about->title }}"
                                 class="w-full h-[520px] object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-forest-900/70 via-forest-900/10 to-transparent"></div>

                            {{-- Bottom badge --}}
                            <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between">
                                <div class="glass-card px-4 py-2 rounded-xl">
                                    <p class="text-white text-xs font-medium">📍 Asia Selatan & Asia Tenggara</p>
                                </div>
                                <div class="glass-card px-4 py-2 rounded-xl">
                                    <p class="text-white text-xs font-medium">🎵 Kicauan Merdu</p>
                                </div>
                            </div>
                        </div>

                        {{-- Floating stat card --}}
                        <div class="absolute -right-6 top-1/3 bg-white rounded-2xl shadow-xl p-5 border border-gray-100 animate-float">
                            <div class="text-center">
                                <p class="text-3xl font-bold text-forest-700 mb-1" style="font-family:'Playfair Display',serif">14-15</p>
                                <p class="text-xs text-gray-500 font-medium">cm panjang</p>
                            </div>
                        </div>

                        {{-- Second floating card --}}
                        <div class="absolute -left-5 bottom-1/4 bg-amber-500 rounded-2xl shadow-xl p-4 animate-float" style="animation-delay:1.5s">
                            <p class="text-white text-sm font-bold">🏆 Populer</p>
                            <p class="text-amber-100 text-xs">Burung Kontes</p>
                        </div>
                    </div>
                @endif

                {{-- Content --}}
                <div class="space-y-8" data-animate>
                    <div class="prose prose-lg max-w-none">
                        {!! $about->body !!}
                    </div>

                    {{-- Feature pills --}}
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        @foreach([
                            ['🎵', 'Suara Merdu & Variatif', 'Kicauan lantang yang khas'],
                            ['🏔️', 'Habitat Hutan Tropis', 'Asia Selatan & Tenggara'],
                            ['🎨', 'Bulu Eksotis', 'Biru cerah & oranye karat'],
                            ['💎', 'Burung Kontes', 'Favorit para kicau mania'],
                        ] as [$icon, $title, $desc])
                            <div class="p-4 rounded-2xl bg-forest-50 border border-forest-100 hover:bg-forest-100 hover:shadow-sm transition-all duration-200 group cursor-default">
                                <span class="text-2xl mb-2 block">{{ $icon }}</span>
                                <p class="font-semibold text-forest-800 text-sm mb-0.5">{{ $title }}</p>
                                <p class="text-xs text-gray-500">{{ $desc }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @else
            <div class="text-center py-16 text-gray-400">
                <p>Konten tentang Sikatan London belum ditambahkan.</p>
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ TIPS & PANDUAN SECTION ═══════════════════════ --}}
<section id="panduan" class="py-24 lg:py-32 bg-gray-50 relative overflow-hidden">

    {{-- Decorations --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-forest-600 via-amber-500 to-forest-600"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-amber-100 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16" data-animate>
            <div>
                <span class="section-label">Panduan Beternak</span>
                <h2 class="section-title">Tips & Panduan<br><span class="text-gradient">Lengkap</span></h2>
                <div class="section-divider"></div>
                <p class="section-subtitle max-w-lg">
                    Kumpulan panduan praktis dari peternak berpengalaman untuk sukses beternak Sikatan London
                </p>
            </div>
            @if($tips->count() > 3)
                <a href="#" class="btn-secondary-sikatan self-start shrink-0">
                    Semua Panduan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            @endif
        </div>

        @if($tips->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tips as $index => $tip)
                    <article class="card-sikatan group flex flex-col" data-animate style="animation-delay:{{ $index * 0.1 }}s">

                        {{-- Image --}}
                        <div class="relative h-56 overflow-hidden shrink-0">
                            <img src="{{ $tip->image_path ?? 'https://placehold.co/600x400/255128/fbbf24?text=Panduan+Beternak' }}"
                                 alt="{{ $tip->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            {{-- Gradient overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            {{-- Category badge --}}
                            <div class="absolute top-4 left-4">
                                <span class="badge-tips shadow-sm">
                                    📖 Tips & Panduan
                                </span>
                            </div>

                            {{-- Number badge --}}
                            <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center shadow-sm">
                                <span class="text-xs font-bold text-forest-700">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 leading-snug group-hover:text-forest-700 transition-colors duration-200 flex-1"
                                style="font-family:'Playfair Display',serif">
                                {{ $tip->title }}
                            </h3>
                            @if($tip->excerpt)
                                <p class="text-gray-500 text-sm leading-relaxed mb-5 line-clamp-3">{{ $tip->excerpt }}</p>
                            @endif
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                                <div class="flex items-center gap-2 text-xs text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $tip->created_at->isoFormat('D MMM Y') }}
                                </div>
                                <span class="inline-flex items-center gap-1 text-forest-700 text-sm font-semibold group-hover:text-amber-600 transition-colors duration-200">
                                    Baca
                                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>

        @else
            {{-- Empty state --}}
            <div class="text-center py-20">
                <div class="w-24 h-24 rounded-full bg-forest-100 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-forest-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg mb-4">Belum ada panduan yang dipublikasikan.</p>
                @auth @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.contents.create') }}" class="btn-primary-sikatan">Tambah Panduan</a>
                @endif @endauth
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ KEUNGGULAN / WHY US SECTION ═══════════════════════ --}}
<section class="py-24 lg:py-32 bg-forest-950 relative overflow-hidden">

    {{-- Background decoration --}}
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-80 h-80 bg-amber-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-forest-700/20 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16" data-animate>
            <span class="inline-block text-xs font-bold uppercase tracking-[0.15em] text-amber-400 bg-amber-400/10 border border-amber-400/20 px-4 py-1.5 rounded-full mb-4">Mengapa Bergabung</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4" style="font-family:'Playfair Display',serif">
                Komunitas Terpercaya<br><span class="text-amber-400">Para Peternak Profesional</span>
            </h2>
            <p class="text-white/60 text-lg max-w-2xl mx-auto">Platform edukasi dan komunitas terlengkap untuk peternak burung Sikatan London di Indonesia</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['🎓', 'Edukasi Lengkap', 'Panduan dari peternak berpengalaman dengan puluhan tahun pengalaman di bidangnya'],
                ['🤝', 'Komunitas Aktif', 'Bergabung dengan ratusan peternak aktif untuk berbagi pengalaman dan tips terbaik'],
                ['📸', 'Galeri Eksklusif', 'Koleksi foto burung Sikatan London terlengkap dari seluruh penjuru Indonesia'],
                ['🔔', 'Update Rutin', 'Informasi dan tips terbaru selalu diperbarui oleh tim ahli dan anggota komunitas'],
            ] as $i => [$icon, $title, $desc])
                <div class="text-center p-8 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300 group" data-animate style="animation-delay:{{ $i * 0.1 }}s">
                    <div class="text-4xl mb-4 block group-hover:scale-110 transition-transform duration-200">{{ $icon }}</div>
                    <h3 class="text-lg font-bold text-white mb-3" style="font-family:'Playfair Display',serif">{{ $title }}</h3>
                    <p class="text-white/50 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ═══════════════════════ GALERI SECTION ═══════════════════════ --}}
<section id="galeri" class="py-24 lg:py-32 bg-white relative overflow-hidden">

    <div class="absolute inset-0 bg-section-pattern opacity-30 pointer-events-none"></div>
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 via-forest-600 to-amber-500"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16" data-animate>
            <span class="section-label">Koleksi Foto</span>
            <h2 class="section-title">Galeri <span class="text-gradient">Sikatan London</span></h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle max-w-2xl mx-auto">
                Keindahan visual burung Sikatan London dalam berbagai momen yang menakjubkan
            </p>
        </div>

        @if($galleries->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($galleries as $index => $photo)
                    <div class="gallery-item {{ $index % 5 === 0 ? 'sm:col-span-2 h-80' : 'h-64' }}"
                         data-src="{{ $photo->image_path }}"
                         data-caption="{{ $photo->caption }}"
                         data-animate style="animation-delay:{{ min($index, 5) * 0.1 }}s">
                        <img src="{{ $photo->image_path }}"
                             alt="{{ $photo->caption ?? 'Galeri Sikatan London' }}"
                             class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                        <div class="gallery-overlay">
                            <div class="flex items-center gap-3 text-white">
                                <div class="w-9 h-9 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                                <div>
                                    @if($photo->caption)
                                        <p class="text-sm font-semibold">{{ Str::limit($photo->caption, 45) }}</p>
                                    @endif
                                    <p class="text-xs text-white/60">{{ $photo->created_at->isoFormat('D MMM Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 text-gray-400">
                <div class="w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-lg mb-4">Belum ada foto di galeri.</p>
                @auth @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.galleries.create') }}" class="btn-primary-sikatan">Upload Foto</a>
                @endif @endauth
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ CTA SECTION ═══════════════════════ --}}
<section class="py-20 bg-gradient-to-br from-forest-700 via-forest-800 to-forest-900 relative overflow-hidden">
    <div class="absolute inset-0 bg-section-pattern opacity-10 pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div data-animate>
            <span class="inline-block px-4 py-1.5 rounded-full bg-amber-400/20 border border-amber-400/30 text-amber-300 text-xs font-bold uppercase tracking-widest mb-6">Bergabung Sekarang</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6" style="font-family:'Playfair Display',serif">
                Siap Memulai Perjalanan<br>Beternak Sikatan London?
            </h2>
            <p class="text-white/70 text-lg mb-10 max-w-2xl mx-auto">
                Bergabunglah dengan komunitas kami dan dapatkan akses ke panduan lengkap, tips eksklusif, dan diskusi dengan para peternak profesional.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @guest
                    <a href="{{ route('register') }}" class="btn-amber px-8 py-4 text-base shadow-xl shadow-amber-600/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Daftar Gratis
                    </a>
                    <a href="{{ route('login') }}" class="btn-outline-white px-8 py-4 text-base">
                        Masuk ke Akun
                    </a>
                @else
                    <a href="{{ route('home') }}#panduan" class="btn-amber px-8 py-4 text-base shadow-xl shadow-amber-600/30">
                        Mulai Belajar Sekarang
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════ FOOTER ═══════════════════════ --}}
<footer id="kontak" class="bg-gray-950 text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10 mb-12">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-amber-500 flex items-center justify-center shadow-lg shadow-amber-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold" style="font-family:'Playfair Display',serif">{{ $settings['site_name'] ?? config('app.name') }}</h3>
                        <p class="text-white/40 text-xs">Komunitas & Edukasi Burung</p>
                    </div>
                </div>
                <p class="text-white/50 text-sm leading-relaxed mb-6 max-w-sm">
                    {{ $settings['site_description'] ?? 'Platform edukasi dan komunitas peternak burung Sikatan London terpercaya di Indonesia.' }}
                </p>

                {{-- Social Media --}}
                <div class="flex items-center gap-3">
                    @if(!empty($settings['social_instagram']))
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/8 hover:bg-pink-600 flex items-center justify-center transition-all duration-200 hover:scale-110 hover:shadow-lg hover:shadow-pink-600/30"
                           title="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_facebook']))
                        <a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/8 hover:bg-blue-600 flex items-center justify-center transition-all duration-200 hover:scale-110 hover:shadow-lg hover:shadow-blue-600/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_youtube']))
                        <a href="{{ $settings['social_youtube'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/8 hover:bg-red-600 flex items-center justify-center transition-all duration-200 hover:scale-110 hover:shadow-lg hover:shadow-red-600/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_whatsapp']))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['social_whatsapp']) }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/8 hover:bg-green-500 flex items-center justify-center transition-all duration-200 hover:scale-110 hover:shadow-lg hover:shadow-green-500/30">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-sm font-bold text-white/70 uppercase tracking-widest mb-6">Navigasi</h4>
                <ul class="space-y-3">
                    @foreach([
                        ['Beranda', '#beranda'],
                        ['Tentang Sikatan', '#tentang'],
                        ['Tips & Panduan', '#panduan'],
                        ['Galeri Foto', '#galeri'],
                        ['Kontak', '#kontak'],
                    ] as [$label, $anchor])
                        <li>
                            <a href="{{ route('home') }}{{ $anchor }}"
                               class="text-white/50 hover:text-amber-400 transition-colors duration-200 text-sm flex items-center gap-2 group">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500/40 group-hover:bg-amber-400 transition-colors duration-200"></span>
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-sm font-bold text-white/70 uppercase tracking-widest mb-6">Kontak Kami</h4>
                <ul class="space-y-4">
                    @if(!empty($settings['contact_email']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <a href="mailto:{{ $settings['contact_email'] }}" class="text-white/50 hover:text-white transition-colors text-sm">{{ $settings['contact_email'] }}</a>
                        </li>
                    @endif
                    @if(!empty($settings['contact_phone']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <span class="text-white/50 text-sm">{{ $settings['contact_phone'] }}</span>
                        </li>
                    @endif
                    @if(!empty($settings['contact_address']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="text-white/50 text-sm leading-relaxed">{{ $settings['contact_address'] }}</span>
                        </li>
                    @endif
                    @if(empty($settings['contact_email']) && empty($settings['contact_phone']) && empty($settings['contact_address']))
                        <li class="text-white/30 text-sm italic">Informasi kontak belum diatur.</li>
                    @endif
                </ul>
            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-white/10 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-white/30 text-sm">
                &copy; {{ date('Y') }} {{ $settings['site_name'] ?? config('app.name') }}. Hak Cipta Dilindungi.
            </p>
            <div class="flex items-center gap-6">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-white/30 hover:text-amber-400 text-xs transition-colors">
                            Panel Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white/30 hover:text-white text-xs transition-colors">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white/30 hover:text-amber-400 text-xs transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-white/30 hover:text-amber-400 text-xs transition-colors">Daftar</a>
                @endauth
            </div>
        </div>
    </div>

</footer>

</x-layouts.public>
