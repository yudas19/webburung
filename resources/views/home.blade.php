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
        {{-- Decorative blobs --}}
        <div class="absolute top-20 right-20 w-64 h-64 bg-amber-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-forest-500/20 rounded-full blur-3xl"></div>
    </div>

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-0">
        <div class="max-w-3xl">

            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium mb-6 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                Komunitas Peternak Burung Indonesia
            </div>

            {{-- Main title --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6 animate-fade-in-up animate-delay-100"
                style="font-family:'Playfair Display',serif">
                {!! $hero->title !!}
            </h1>

            {{-- Subtitle --}}
            <p class="text-xl text-white/85 leading-relaxed mb-10 animate-fade-in-up animate-delay-200">
                {!! $hero->subtitle !!}
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-4 animate-fade-in-up animate-delay-300">
                <a href="{{ $hero->cta_link ?? '#panduan' }}" class="btn-amber text-base px-8 py-4 shadow-lg shadow-amber-500/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.75 19 7.5 19s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 19 16.5 19c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    {{ $hero->cta_text ?? 'Jelajahi Panduan' }}
                </a>
                <a href="{{ route('home') }}#galeri" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold border-2 border-white/40 text-white hover:bg-white/10 transition-all duration-300 backdrop-blur-sm text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Lihat Galeri
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-14 flex flex-wrap gap-8 animate-fade-in-up animate-delay-400">
                <div class="text-center">
                    <p class="text-3xl font-bold text-amber-400" style="font-family:'Playfair Display',serif">500+</p>
                    <p class="text-white/60 text-sm">Anggota Komunitas</p>
                </div>
                <div class="w-px bg-white/20"></div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-amber-400" style="font-family:'Playfair Display',serif">{{ $tips->count() }}</p>
                    <p class="text-white/60 text-sm">Panduan Beternak</p>
                </div>
                <div class="w-px bg-white/20"></div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-amber-400" style="font-family:'Playfair Display',serif">{{ $galleries->count() }}</p>
                    <p class="text-white/60 text-sm">Foto Koleksi</p>
                </div>
            </div>

        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/50 animate-bounce">
        <span class="text-xs">Gulir ke bawah</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

</section>


{{-- ═══════════════════════ TENTANG SECTION ═══════════════════════ --}}
<section id="tentang" class="py-20 lg:py-28 bg-earth-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-14" data-animate>
            <span class="badge-about mb-3">Pengenalan Spesies</span>
            <h2 class="section-title mt-2">Mengenal Burung Sikatan London</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle max-w-2xl mx-auto">
                <em>Cyornis tickelliae</em> — Salah satu burung kicauan paling eksotis dan dicari di Asia Tenggara
            </p>
        </div>

        @if($about)
            <div class="grid lg:grid-cols-2 gap-12 items-start">

                {{-- Image --}}
                @if($about->image_path)
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl" data-animate>
                        <img src="{{ $about->image_path }}" alt="{{ $about->title }}"
                             class="w-full h-80 lg:h-[480px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-forest-900/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-medium border border-white/30">
                                📍 Asia Selatan & Asia Tenggara
                            </span>
                        </div>
                    </div>
                @endif

                {{-- Content --}}
                <div class="space-y-6" data-animate>
                    <div class="prose prose-lg prose-forest max-w-none text-gray-700 leading-relaxed">
                        {!! $about->body !!}
                    </div>

                    {{-- Feature pills --}}
                    <div class="flex flex-wrap gap-3 pt-4">
                        @foreach([['🎵','Suara Merdu'],['🏔️','Habitat Hutan'],['🎨','Bulu Eksotis'],['💎','Kicauan Variatif']] as [$icon, $label])
                            <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-forest-50 border border-forest-200 text-forest-700 text-sm font-medium">
                                <span>{{ $icon }}</span> {{ $label }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        @else
            <div class="text-center py-12 text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p>Konten tentang Sikatan London belum ditambahkan.</p>
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ TIPS & PANDUAN SECTION ═══════════════════════ --}}
<section id="panduan" class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-14" data-animate>
            <span class="badge-tips mb-3">Panduan Beternak</span>
            <h2 class="section-title mt-2">Tips & Panduan Lengkap</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle max-w-2xl mx-auto">
                Kumpulan panduan praktis dari para peternak berpengalaman untuk sukses beternak Sikatan London
            </p>
        </div>

        @if($tips->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tips as $tip)
                    <article class="card-sikatan group" data-animate>

                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden">
                            <img src="{{ $tip->image_path ?? 'https://placehold.co/400x250/2d6530/ffffff?text=Tips+Beternak' }}"
                                 alt="{{ $tip->title }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute top-4 left-4">
                                <span class="badge-tips">Tips & Panduan</span>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-forest-700 transition-colors duration-200"
                                style="font-family:'Playfair Display',serif">
                                {{ $tip->title }}
                            </h3>
                            @if($tip->excerpt)
                                <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">{{ $tip->excerpt }}</p>
                            @endif
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">{{ $tip->created_at->diffForHumans() }}</span>
                                <span class="text-forest-700 text-sm font-medium group-hover:text-amber-600 transition-colors duration-200 flex items-center gap-1">
                                    Baca Selengkapnya
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
            <div class="text-center py-16">
                <div class="w-20 h-20 rounded-full bg-forest-50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-forest-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <p class="text-gray-500">Belum ada panduan yang dipublikasikan.</p>
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ GALERI SECTION ═══════════════════════ --}}
<section id="galeri" class="py-20 lg:py-28 bg-forest-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-14" data-animate>
            <span class="badge-tips mb-3">Koleksi Foto</span>
            <h2 class="section-title mt-2">Galeri Sikatan London</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-subtitle max-w-2xl mx-auto">
                Keindahan visual burung Sikatan London dalam berbagai momen yang menakjubkan
            </p>
        </div>

        @if($galleries->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($galleries as $photo)
                    <div class="gallery-item h-64"
                         data-src="{{ $photo->image_path }}"
                         data-caption="{{ $photo->caption }}"
                         data-animate>
                        <img src="{{ $photo->image_path }}"
                             alt="{{ $photo->caption ?? 'Galeri Sikatan London' }}"
                             class="w-full h-full object-cover">
                        <div class="gallery-overlay">
                            <div class="flex items-center gap-2 text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                </svg>
                                <span class="text-sm font-medium">{{ Str::limit($photo->caption, 40) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 text-gray-400">
                <p>Belum ada foto di galeri.</p>
            </div>
        @endif

    </div>
</section>


{{-- ═══════════════════════ FOOTER / KONTAK SECTION ═══════════════════════ --}}
<footer id="kontak" class="bg-forest-950 text-white">

    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10">

            {{-- Brand Column --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-amber-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3C7 3 3 7 3 12c0 2.5 1 4.8 2.7 6.4L12 21l6.3-2.6A9 9 0 0 0 12 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold" style="font-family:'Playfair Display',serif">{{ $settings['site_name'] ?? config('app.name') }}</h3>
                        <p class="text-white/40 text-xs">Komunitas & Edukasi Burung</p>
                    </div>
                </div>
                <p class="text-white/60 text-sm leading-relaxed mb-6 max-w-sm">
                    {{ $settings['site_description'] ?? 'Platform edukasi dan komunitas peternak burung Sikatan London terpercaya di Indonesia.' }}
                </p>

                {{-- Social Media --}}
                <div class="flex items-center gap-3">
                    @if(!empty($settings['social_instagram']))
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/10 hover:bg-amber-500 flex items-center justify-center transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_facebook']))
                        <a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/10 hover:bg-blue-600 flex items-center justify-center transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_youtube']))
                        <a href="{{ $settings['social_youtube'] }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/10 hover:bg-red-600 flex items-center justify-center transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>
                            </svg>
                        </a>
                    @endif
                    @if(!empty($settings['social_whatsapp']))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['social_whatsapp']) }}" target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-xl bg-white/10 hover:bg-green-600 flex items-center justify-center transition-all duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-sm font-bold text-white/90 uppercase tracking-widest mb-5">Navigasi</h4>
                <ul class="space-y-3">
                    @foreach([['Beranda','home'],['Tentang Sikatan','home'],['Tips & Panduan','home'],['Galeri Foto','home']] as [$label, $route])
                        <li>
                            <a href="{{ route($route) }}#{{ Str::slug($label) }}"
                               class="text-white/50 hover:text-amber-400 transition-colors duration-200 text-sm flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500/50"></span>
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-sm font-bold text-white/90 uppercase tracking-widest mb-5">Kontak Kami</h4>
                <ul class="space-y-4">
                    @if(!empty($settings['contact_email']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <a href="mailto:{{ $settings['contact_email'] }}" class="text-white/60 hover:text-white transition-colors duration-200 text-sm">
                                {{ $settings['contact_email'] }}
                            </a>
                        </li>
                    @endif
                    @if(!empty($settings['contact_phone']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <span class="text-white/60 text-sm">{{ $settings['contact_phone'] }}</span>
                        </li>
                    @endif
                    @if(!empty($settings['contact_address']))
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="text-white/60 text-sm leading-relaxed">{{ $settings['contact_address'] }}</span>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-white/40 text-sm">
                &copy; {{ date('Y') }} {{ $settings['site_name'] ?? config('app.name') }}. Hak Cipta Dilindungi.
            </p>
            <div class="flex items-center gap-4">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-white/40 hover:text-amber-400 text-sm transition-colors duration-200">
                            Panel Admin
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-white/40 hover:text-amber-400 text-sm transition-colors duration-200">
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </div>

</footer>

</x-layouts.public>
